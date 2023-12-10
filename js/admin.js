// admin.js

// ... (existing code)

function addAction() {
    const actionName = document.getElementById('action-name').value;
    const actionDescription = document.getElementById('action-description').value;
    const actionImage = document.getElementById('action-image').files[0]; // Get the selected file

    // Validate input
    if (!actionName || !actionDescription || !actionImage) {
        alert('Please fill in all fields and select an image.');
        return;
    }

    // Assume you have a function to upload the image and get the URL
    const imageUrl = uploadImage(actionImage);

    // Create a new action object
    const newAction = {
        name: actionName,
        description: actionDescription,
        image: imageUrl,
    };

    // Add the new action to the list
    addActionToList(newAction);

    // Clear the form fields
    document.getElementById('action-name').value = '';
    document.getElementById('action-description').value = '';
    document.getElementById('action-image').value = '';
}

function uploadImage(imageFile) {
    // Assume you have logic to upload the image file and get the URL
    // You may use XMLHttpRequest, Fetch API, or any other method
    // For simplicity, let's assume a function uploadImage returns the URL
    // This is where you'd implement your server-side logic to handle file uploads
    // Return a placeholder URL for now
    return 'placeholder_url.jpg';
}

function addActionToList(action) {
    const actionList = document.getElementById('action-list');

    // Create a new list item
    const listItem = document.createElement('li');

    // Create elements for the action details
    const nameElement = document.createElement('h3');
    nameElement.textContent = action.name;

    const descriptionElement = document.createElement('p');
    descriptionElement.textContent = action.description;

    const imageElement = document.createElement('img');
    imageElement.src = action.image;
    imageElement.alt = action.name;

    // Create a delete button
    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.onclick = () => deleteAction(listItem);

    // Append elements to the list item
    listItem.appendChild(nameElement);
    listItem.appendChild(descriptionElement);
    listItem.appendChild(imageElement);
    listItem.appendChild(deleteButton);

    // Append the list item to the action list
    actionList.appendChild(listItem);
}

function deleteAction(listItem) {
    // Remove the list item from the DOM
    listItem.remove();
}

// ... (existing code)
