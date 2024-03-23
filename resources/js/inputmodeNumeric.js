//Validates the REGEX expression on the HTML attribute “pattern”, if the input has and inputmode='numeric'
const numericInputs = document.querySelectorAll("[inputmode='numeric']");

numericInputs.forEach((input) => {
    validateNumericInput(input);
});

function validateNumericInput(el) {
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
