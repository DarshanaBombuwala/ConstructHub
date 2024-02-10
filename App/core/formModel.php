<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/form.css">
</head>
<body>

<!-- Modal for the form -->
<div class="modal" id="dynamicFormsContainer">
    <div class="modal-content" id="formContainer"></div>
</div>

<script>
    // Dummy data for three forms
    const formsData = {
        "Form 1": [
            { label: "Name", type: "text" },
            { label: "Email", type: "email" },
            { label: "Password", type: "password" }
        ],
        "Form 2": [
            { label: "Age", type: "number" },
            { label: "Address", type: "text" },
            { label: "Phone", type: "tel" }
        ],
        "feedback": [
            { label: "Name", type: "text", id: "name" },
            { label: "Email", type: "email", id: "email"},
            { label: "Password", type: "password" },
            { label: "cv", type: "file" },
            { label: "Date of Birth", type: "date" },
            { label: "Male", type: "checkbox", checked: "true" },
            { label: "Female", type: "checkbox" },
            { label: "country", options: ["sri-lanka", "india"], id:"country"}
        ]
    };

    // Function to generate a specific form dynamically
    function generateForm(formTitle) {
        const formContainer = document.getElementById("formContainer");
        const formFields = formsData[formTitle];

        if (!formFields) {
            console.error(`Form with title "${formTitle}" not found.`);
            return;
        }

        const form = document.createElement("form");
        form.innerHTML = `<h2>${formTitle}</h2>`;

        const closebtn = document.createElement("button");
        closebtn.innerHTML = `<i class="fa fa-window-close"></i>`;
        closebtn.id = "closebtn";
        
        form.appendChild(closebtn);

        formFields.forEach(field => {
            if (!field.options){
                const input = document.createElement("input");
                input.setAttribute("type", field.type);
                input.setAttribute("id", field.id);
                input.setAttribute("name", field.name);
                input.setAttribute("placeholder", field.label);

                const label = document.createElement("label");
                label.textContent = field.label;

                form.appendChild(label);
                form.appendChild(input);
            }
            else{
                const select = document.createElement("select");
                select.setAttribute("id", field.id);
                select.setAttribute("name", field.name);

                const label = document.createElement("label");
                label.textContent = field.label;

                let select_opt = "";
                field.options.forEach(opt =>{
                    select_opt += `<option value="${opt}">${opt}</option>`;
                });

                select.innerHTML = select_opt;
                form.appendChild(label);
                form.appendChild(select);
            }
            
        });

        const submitBtn = document.createElement("button");
        submitBtn.innerHTML = "Submit";

        const resetBtn = document.createElement("reset");
        resetBtn.innerHTML = "Reset";

        formContainer.innerHTML = "";
        formContainer.appendChild(form);
        formContainer.appendChild(resetBtn);
        formContainer.appendChild(submitBtn);
    }

    // Function to show the modal
    function showModal() {
        const modal = document.querySelector(".modal");
        modal.style.display = "flex";
    }

    // Function to hide the modal
    function hideModal() {
        const modal = document.querySelector(".modal");
        modal.style.display = "none";
    }
    
    function formpopup(formname){
        // Call the function to generate a specific form
        generateForm(formname);
        showModal();

        // Close the modal when clicking outside the form
        window.addEventListener("click", function(event) {
            const modal = document.querySelector(".modal");
            if (event.target === modal) {
                hideModal();
            }
        }); 
        closebtn.addEventListener("click", function(event) {
                hideModal();
        });  
    }

</script>

</body>
</html>
