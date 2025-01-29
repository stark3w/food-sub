document.addEventListener("DOMContentLoaded", function () {
    let dateIndex = 1;

    document.getElementById("add-delivery-date").addEventListener("click", function () {
        const dateContainer = document.getElementById("delivery_dates");

        const newDateFields = document.createElement("div");
        newDateFields.classList.add("delivery-date");

        newDateFields.innerHTML = `
            <input type="date" name="delivery_dates[${dateIndex}][from]" class="form-control" required>
            <input type="date" name="delivery_dates[${dateIndex}][to]" class="form-control" required>
        `;

        dateContainer.appendChild(newDateFields);
        dateIndex++;
    });
});
