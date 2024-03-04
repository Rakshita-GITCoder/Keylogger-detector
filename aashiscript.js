const secretSequence = "open"; // Define your secret key sequence here
let currentInput = "";

const sequenceInput = document.getElementById("sequenceInput");
const status = document.getElementById("status");

sequenceInput.addEventListener("keyup", (e) => {
    currentInput += e.key;
    if (currentInput.includes(secretSequence)) {
        status.textContent = "Key sequence detected. Triggering action...";
        // Replace the above line with your desired action
        // For example, you could redirect the user to a secret page
        setTimeout(() => {
            currentInput = "";
            sequenceInput.value = "";
            status.textContent = "";
        }, 1000); // Clear the input and status after 1 second
    } else if (secretSequence.startsWith(currentInput)) {
        // Continue to listen for more keys in the sequence
    } else {
        currentInput = "";
    }
});