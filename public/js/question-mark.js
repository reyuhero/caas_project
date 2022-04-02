customElements.define('question-mark', class extends HTMLElement { 
    constructor(){
        super();
        const template = `
            <article class="bg-white">
                <slot></slot>
            </article>
        `;
        let shadow = this.attachShadow({ mode: "open"})
        shadow.appendChild(template.content.cloneNode(true));
    }
    // connectedCallback(){
    //     this.innerHTML = "<i class='fas fa-question-circle text-primary'></i>"
    // }
})