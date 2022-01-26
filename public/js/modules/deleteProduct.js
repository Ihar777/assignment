export default class deleteProduct {

    constructor() {
        try {
            this.btnValue = document.getElementById('delete-product-btn').getAttribute('value');
            if (!Array.isArray(this.btnValue)) {
                this.btnValue = new Array();
            }
        } catch (e) {}
    }

    init() {

        let checkboxes = document.querySelectorAll("input[type='checkbox'][class='delete-checkbox']");
        let enabledCheckboxes = [];
        try {
            document.querySelector('.products__list').addEventListener('click', e => {
                let target = e.target;
                if (target.classList.contains('delete-checkbox')) {

                    if (target.checked) {
                        if (!this.btnValue.includes(target.value)) {
                            this.btnValue.push(target.value);
                        }
                        checkboxes.forEach(function (checkbox) {
                            checkbox.addEventListener('change', function () {
                                enabledCheckboxes =
                                    Array.from(checkboxes)
                                    .filter(i => i.checked)
                                    .map(i => i.value);
                            })
                        });
                        enabledCheckboxes.forEach(item => {
                            if (!this.btnValue.includes(item)) {
                                this.btnValue.push(item);
                            }
                        });

                        checkboxes.forEach(item => {
                            if (this.btnValue.includes(item.value) && !item.checked) {
                                console.log(this.btnValue);
                                let index = this.btnValue.indexOf(item.value);
                                this.btnValue.splice(index, 1);

                            }
                        });
                    } else {
                        checkboxes.forEach(item => {
                            if (this.btnValue.includes(item.value) && !item.checked) {
                                console.log(this.btnValue);
                                let index = this.btnValue.indexOf(item.value);
                                console.log(`checkbox index ${index}`);
                                this.btnValue.splice(index, 1);

                            }
                        });

                        let i = this.btnValue.indexOf(target.value);
                        console.log(`target index ${i}`);
                        if (i >= 0) {
                            this.btnValue.splice(i, 1);
                        }

                    }
                    console.log(this.btnValue);
                    console.log(typeof (this.btnValue));
                    document.getElementById('delete-product-btn').setAttribute('value', this.btnValue);

                }
            });
        } catch (e) {}

    }
}