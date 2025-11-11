import "./app.min.js";
import "./ctablock.min.js";
/* empty css                */
/* empty css          */
/* empty css               */
/* empty css                 */
let skillCards = document.querySelectorAll(".skill-card");
if (skillCards.length > 0) {
  skillCards.forEach(function(skillCard, index) {
    let itemNumber = skillCard.querySelector(".skill-card__number");
    if (itemNumber) {
      let num = index + 1;
      itemNumber.innerText = num < 10 ? "0" + num : num.toString();
    }
  });
}
