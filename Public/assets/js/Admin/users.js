document.addEventListener("DOMContentLoaded", function() {
    const userList = document.getElementById("userList");
    const addUserBtn = document.getElementById("addUserBtn");
    const userForm = document.getElementById("userForm");
    const saveUserBtn = document.getElementById("saveUserBtn");

    addUserBtn.addEventListener("click", () => {
        userForm.style.display = "block";
        clearForm();
    });

    saveUserBtn.addEventListener("click", () => {
        // Implement save user logic here (e.g., send data to the server)
        // After saving, update the user list and clear the form
        updateUserList();
        clearForm();
    });

    function updateUserList() {
        // Implement fetching and displaying users here
        // For now, let's assume we have a list of users:
        const users = [
            { id: 1, name: "User 1", role: "Role 1" },
            { id: 2, name: "User 2", role: "Role 2" }
        ];

        userList.innerHTML = ""; // Clear the list

        for (const user of users) {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${user.id}</td>
                <td>${user.name}</td>
                <td>${user.role}</td>
                <td><button class="editUser">Edit</button></td>
            `;
            userList.appendChild(row);
        }

        // Attach event listeners to edit buttons
        const editButtons = document.querySelectorAll(".editUser");
        editButtons.forEach(button => {
            button.addEventListener("click", () => {
                userForm.style.display = "block";
                // Fill the form with user data for editing
                const row = button.closest("tr");
                const cells = row.getElementsByTagName("td");
                document.getElementById("userId").value = cells[0].textContent;
                document.getElementById("userName").value = cells[1].textContent;
                document.getElementById("userRole").value = cells[2].textContent;
            });
        });
    }

    function clearForm() {
        document.getElementById("userId").value = "";
        document.getElementById("userName").value = "";
        document.getElementById("userRole").value = "";
    }

    // Initial user list
    updateUserList();
});
