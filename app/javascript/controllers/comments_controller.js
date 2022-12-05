import { Controller } from "@hotwired/stimulus"

export default class extends Controller {
  connect() {

    console.log(123);
    // this.element.textContent = "Hello World!"
  }
  toggleForm(event){
    event.preventDefault();
    event.stopPropagation();
    console.log('I Clicked');

    // const form = document.getElementById('edit-form-2');
    // form.classList.toggle('d-none')

    const formID = event.params["form"];
    const bodyID = event.params["body"];

    const form = document.getElementById(formID);
    form.classList.toggle("d-none");
    form.classList.toggle("mt-5");

    const body = document.getElementById(bodyID);
    body.classList.toggle("d-none");

  }
}
