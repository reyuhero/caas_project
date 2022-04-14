class MyElement extends HTMLElement{
    constructor(){
        super();
        this.attachShadow({mode: "open"})
        this.render();
    }
    render(){
        this.shadowRoot.innerHTML = //html
        `
        <style>
            @import url('style.css');
        </style>
        <h2 class="text-danger h2">Hello Ryo</h2>
        `
    }
}
customElements.define("my-el",MyElement);