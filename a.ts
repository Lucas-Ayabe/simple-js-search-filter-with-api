function showDate(event: MouseEvent) {
    const target = event.target as HTMLElement;
    const itemDice = target
        .closest(".item")
        .querySelector(".item--dice") as HTMLElement;

    itemDice.style.opacity = "0";
    if (itemDice.style.display == "flex") {
        setTimeout(() => {
            itemDice.style.display = "none";
        }, 350);
    } else {
        itemDice.style.display = "flex";
        setTimeout(() => {
            itemDice.style.opacity = "1";
        }, 200);
    }
}
