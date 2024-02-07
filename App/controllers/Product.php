<?php

// require "../App/views/Homepage_view.php";

class Product extends Main_controller
{
    public function index()
    {
        $this->view('productsNew');
    }

    public function fetchProducts($type)
    {
        if ($type === 'equipments') {
            $equipmentlisting = new Equipmentlisting;
            $data['rows'] = $equipmentlisting->findAll('asc', 'equipmentTypeId');
            $jsonData = json_encode($data['rows']);
            echo $jsonData;
        }
        if ($type === 'vehicles') {
            $equipmentlisting = new Equipmentlisting;
            $data['rows'] = $equipmentlisting->findAll('asc', 'equipmentTypeId');
            $jsonData = json_encode($data['rows']);
            echo $jsonData;
        }
        if ($type === 'professionals') {
            $listing = new listing('professional');
            $data['rows'] = $listing->findAll('asc', 'professionalTypeId');
            $jsonData = json_encode($data['rows']);
            echo $jsonData;
        }
    }

    public function productview($type=null,$id = null)
    {
        $equipmentlisting = new Equipmentlisting;
        $view=new Create($type.'listing',[]);
        $data['row'] = $view->firstview($id);
        //show($equipmentlisting->equipmentInstanceCount(1));


        $this->view('p', $data);
    }

    public function reservationdetails($action = null, $id = null, $type = null)
    {
        if ($action == 'create') {
            $equipmentTypeId = $id;
            $reservation_det = $_POST;
            $equipmentlisting = new Equipmentlisting;
            $equipmentType = $type;
            $reservations = $equipmentlisting->dates();



            function getDatesBetween($startDate, $endDate)
            {
                $start = new DateTime($startDate);
                $end = new DateTime($endDate);
                $end->modify('+1 day'); // Include the end date

                $interval = new DateInterval('P1D');
                $dateRange = new DatePeriod($start, $interval, $end);

                $dates = [];
                foreach ($dateRange as $date) {
                    $dates[] = $date->format('Y-m-d');
                }

                return $dates;
            }


            $datesArray = getDatesBetween($reservation_det['startDate'], $reservation_det['endDate']);

            $quantity = $reservation_det['quantity'];



            // Process reservations and generate dates for each equipment ID
            $equipmentDates = [];
            foreach ($reservations as $reservation) {
                $equipmentId = $reservation->equipmentid;
                $startDate = $reservation->startDate;
                $endDate = $reservation->endDate;

                // Get dates between start and end date
                $dates = getDatesBetween($startDate, $endDate);

                // Save dates for each equipment ID
                if (!isset($equipmentDates[$equipmentId])) {
                    $equipmentDates[$equipmentId] = [];
                }

                $equipmentDates[$equipmentId] = array_merge($equipmentDates[$equipmentId], $dates);
            }

            function filterCommonDates($dates1, $dates2, $quantity)
            {
                $filteredIds = [];

                foreach ($dates2 as $id => $dates) {
                    $commonDates = array_intersect($dates1, $dates);

                    // If there are no common dates, proceed
                    if (empty($commonDates)) {
                        // Find the nearest smaller date for the current equipment ID
                        $nearestSmallerDate = null;
                        foreach ($dates as $date) {
                            if ($date < min($dates1) && ($nearestSmallerDate === null || $date > $nearestSmallerDate)) {
                                $nearestSmallerDate = $date;
                            }
                        }

                        // Add the ID to the filtered list along with the gap duration
                        if ($nearestSmallerDate !== null) {
                            $filteredIds[$id] = abs(strtotime($nearestSmallerDate) - strtotime(min($dates1)));
                        }
                    }
                }

                // Sort the filtered IDs based on the gap duration in descending order
                arsort($filteredIds);

                // Return only the specified quantity of IDs
                return array_slice(array_keys($filteredIds), 0, $quantity);
            }



            $filteredIds = filterCommonDates($datesArray, $equipmentDates, $quantity);
            redirect('product');
        }

        $data['reservation_details'] = $_POST;
        $this->view('reservationDetails', $data);
    }

    public function reservedDays()
    {

        $equipmentlisting = new Equipmentlisting;
        $reservations = $equipmentlisting->dates();


        // Function to get all dates between start and end date
        function getDatesBetween($startDate, $endDate)
        {
            $start = new DateTime($startDate);
            $end = new DateTime($endDate);
            $end->modify('+1 day'); // Include the end date

            $interval = new DateInterval('P1D');
            $dateRange = new DatePeriod($start, $interval, $end);

            $dates = [];
            foreach ($dateRange as $date) {
                $dates[] = $date->format('Y-m-d');
            }

            return $dates;
        }

        // Process reservations and generate dates for each equipment ID
        $equipmentDates = [];
        foreach ($reservations as $reservation) {
            $equipmentId = $reservation->equipmentid;
            $startDate = $reservation->startDate;
            $endDate = $reservation->endDate;

            // Get dates between start and end date
            $dates = getDatesBetween($startDate, $endDate);

            // Save dates for each equipment ID
            if (!isset($equipmentDates[$equipmentId])) {
                $equipmentDates[$equipmentId] = [];
            }

            $equipmentDates[$equipmentId] = array_merge($equipmentDates[$equipmentId], $dates);
        }

        // Output the result

        $equipmentCountPerDay = [];
        foreach ($equipmentDates as $equipmentId => $dates) {
            foreach ($dates as $date) {
                if (!isset($equipmentCountPerDay[$date])) {
                    $equipmentCountPerDay[$date] = 1;
                } else {
                    $equipmentCountPerDay[$date]++;
                }
            }
        }


        $count = $equipmentlisting->count();

        $expectedCount = $count[0]->recordCount; // Replace with your actual recordCount value

        // Adjust the counts based on the comparison
        foreach ($equipmentCountPerDay as &$counts) {
            if ($counts < $expectedCount) {
                $counts = $expectedCount - $counts;
            } elseif ($counts == $expectedCount) {
                $counts = 0; // Mark as not available
            }
        }
        $equipmentCountPerDay['expectedCount'] = $expectedCount;

        header('Content-Type: application/json');
        $jsonResult = json_encode($equipmentCountPerDay);
        echo $jsonResult;
    }

    public function requestQuotation($action = null, $id = null, $type = null)
    {
        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        $data['type'] = $type;

        $quotationRequest = [
            'table' => 'quotations',
            'allowedColumns' => ['description', 'categoryname', 'estimation', 'profession'],
        ];
        $quotation = new Create($quotationRequest['table'], $quotationRequest['allowedColumns']);

        if ($action == 'create') {

            

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $quotation->insert($_POST);
                //$data['row'] = $quotation->firstview($id);
                $this->view('p', $data);
            }
        } else if ($action == 'edit') {
        } else if ($action == 'delete') {
        } else {
            $this->view('quotationRequest', $data);
        }
    }
}
