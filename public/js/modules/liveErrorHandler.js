export default class liveErrorHandler {

    constructor() {
        this.textInputs = document.querySelectorAll('input[type="text"]');
        this.numberInputs = document.querySelectorAll('input[type="number"]');
        this.errorMessage = 'Please, provide the data of indicated type';
    }



    init() {
        this.textInputs.forEach(input => {

            input.addEventListener('keyup', e => {
                input.nextElementSibling.textContent == '';


                let pattern = /^[a-z0-9 .\-]+$/i;
                let testResult = pattern.test(input.value);
                console.log(testResult);
                console.log(input.nextElementSibling);
                if (!pattern.test(e.key)) {
                    if (!input.nextElementSibling.classList.contains('visible')) {
                        input.nextElementSibling.classList.add('visible');
                    }
                    input.nextElementSibling.textContent = this.errorMessage;
                }
            });
        });

        this.numberInputs.forEach(numberInput => {

            numberInput.addEventListener('keyup', e => {
                numberInput.nextElementSibling.textContent == '';

                let pattern = /^[0-9.]+$/;
                console.log(pattern.test(e.key));
                if (!pattern.test(e.key)) {
                    if (!numberInput.nextElementSibling.classList.contains('visible')) {
                        numberInput.nextElementSibling.classList.add('visible');
                    }
                    numberInput.nextElementSibling.textContent = this.errorMessage;
                }
            });
        });
    }
}