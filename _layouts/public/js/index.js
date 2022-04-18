console.log("javascript is running")
const openModal = (id,open=1) => {
    const modal = document.getElementById(id);
    if(open === 0)
    modal.close();
    else
    modal.showModal();
} 

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
function goto(id) {
    var url= window.origin;
    window.location = `${url}/${id}.html`
}

customElements.define('x-markup', class extends HTMLElement {
  connectedCallback() {
    this.innerHTML = "<b>I'm an x-foo-with-markup!</b>";
  }
});  