//Validates the REGEX expression on the HTML attribute “pattern”, if the input has and inputmode='text'
const textInputs = document.querySelectorAll("[inputmode='text']");

textInputs.forEach((input) => {
    validateTextInput(input);
});

function validateTextInput(el) {
    el.addEventListener("beforeinput", function (e) {
        let beforeValue = el.value;
        e.target.addEventListener(
            "input",
            function () {
                if (el.validity.patternMismatch) {
                    el.value = beforeValue;
                }
            },
            { once: true }
        );
    });
}

// este scripts entra en conflicto con livewire, podria funcionar si lo convierto en una function de una clase de livewire