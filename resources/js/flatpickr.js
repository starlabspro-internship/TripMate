import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css"; 

    flatpickr("#date-picker", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        minDate: "today"
    });
    flatpickr("#filter-date", {
        dateFormat: "Y-m-d",
        time_24hr: true,
        minDate: "today" 
    });