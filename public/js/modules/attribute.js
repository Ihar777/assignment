export default class Attribute {
    constructor(selector, items) {
        try {
            this.attributes = document.querySelectorAll(items);
            this.selector = document.querySelector(selector);
            this.notification = {
                DVD: 'Please, provide disc space in MB',
                Furniture: 'Please, provide dimensions in HxWxL format',
                Book: 'Please, provide weight in Kg'
            };

            let self = this;
            this.inputs = {
                DVD: self.attributes[4],
                Furniture: [self.attributes[5], self.attributes[6], self.attributes[7]],
                Book: self.attributes[8]
            };

        } catch (e) {}
    }

    bindTriggers(switcher) {
        if (switcher.value) {
            this.inputs[switcher.value].length > 1 ? this.inputs[switcher.value].forEach(input => input.style.display = 'flex') : this.inputs[switcher.value].style.display = 'flex';
        }
        switcher.addEventListener('change', (e) => {
            const result = document.getElementById('notification');
            let value = e.target.value;
            try {
                for (let i = 4; i <= 8; i++) {
                    this.attributes[i].style.display = 'none';

                }
            } catch (e) {}
            if (value === '') {
                result.style.display = 'none';
                result.textContent = '';
            } else {
                this.inputs[value].length > 1 ? this.inputs[value].forEach(input => input.style.display = 'flex') : this.inputs[value].style.display = 'flex';
                result.style.display = 'block';
                result.textContent = this.notification[value];
            }
        });
    }

    hideItems(items) {
        items.forEach((item, i) => {
            if (i >= 4) {
                item.style.display = 'none';
            }
        });
    }

    init() {
        this.hideItems(this.attributes);
        this.bindTriggers(this.selector);
    }
}