customElements.define('my-component', class extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `<b>Reza Yousofi</b>`;
    }
});
