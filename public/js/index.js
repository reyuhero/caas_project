const dialog = document.querySelector("dialog")
const openDialog = document.querySelector(".open-dialog")
const closeDialog = document.querySelector(".close-dialog")
openDialog.addEventListener('click', () => dialog.showModal());
closeDialog.addEventListener('click', () => dialog.close());
const nextStep = (step) => {
    console.log(step);
    const stepContent = document.querySelector(step);
    const allStepContent = document.querySelectorAll("step-content");

    allStepContent.forEach(item => {
        if(item.id === stepContent.id)
            item.classList.remove('d-none')
        else
            item.classList.add('d-none')
    })
}

const QuestionMarkTemplate = '<i class="fas fa-question-circle text-primary"></i>'
class QuestionMark extends HTMLLIElement {
    constructor(){
        super();
        this.attachShadow({mode: "open"})
        this.shadowRoot.appendChild(QuestionMarkTemplate)
    }
}
globalThis.customElements.define('question-mark', QuestionMarkTemplate)