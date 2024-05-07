import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;


Alpine.data('imageHandler', () => ({
    imageSrc : null,
    uploadHandler(e){
        const {files} = e.target;

        const reader = new FileReader();


        reader.onload = function (){
            this.imageSrc = reader.result;
        }.bind(this)



        reader.readAsDataURL(files[0]);
    }
}));

Alpine.data("lineChart", () => ({
    chart: null,
    init() {
        const chartElement = this.$refs.chart;

        var options = {
            series: [
                {
                    name: "Desktops",
                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148],
                },
            ],
            chart: {
                height: 350,
                type: "line",
                zoom: {
                    enabled: false,
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "straight",
            },
            title: {
                text: "Product Trends by Month",
                align: "left",
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                    opacity: 0.5,
                },
            },
            xaxis: {
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                ],
            },
        };

        this.chart = new ApexCharts(chartElement, options);
        this.chart.render();
    },
}));

Alpine.data('calendarInit', () => ({
    calender : null,
    init(){

        const calendarElement = this.$refs.calendar;

        var calendar = new FullCalendar.Calendar(calendarElement, {
            initialView: 'dayGridMonth'
          });
          calendar.render();
    }
}));

Alpine.start();
