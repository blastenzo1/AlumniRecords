const options = {
    colors: ["#EF4444"],
    series: [
        {
            name: "Number of Graduates",
            data: [
                { x: "CA", y: 150 },
                { x: "CAS", y: 200 },
                { x: "CBA", y: 180 },
                { x: "CCS", y: 250 },
                { x: "CE", y: 170 },
                { x: "CoE", y: 220 },
                { x: "CL", y: 190 },
                { x: "CMT", y: 160 },
                { x: "CMC", y: 210 },
                { x: "CMA", y: 230 },
                { x: "CN", y: 240 },
                { x: "CPVA", y: 260 },
                { x: "CPT", y: 280 },
                { x: "DV", y: 120 },
                { x: "ES", y: 130 },
                { x: "IES", y: 140 },
                { x: "SBE", y: 170 },
                { x: "SoM", y: 190 },
                { x: "SPAG", y: 180 },
            ],
        },
    ],
    // series: [
    //     {
    //         name: "Number of Graduates",
    //         data: alumniData.map((item) => ({
    //             x: item.college,
    //             y: item.alumni_count,
    //             acronym_name: item.course,
    //         })),
    //     },
    // ],
    chart: {
        type: "bar",
        height: "320px",
        fontFamily: "Inter, sans-serif",
        toolbar: {
            show: false,
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "70%",
            borderRadiusApplication: "end",
            borderRadius: 8,
        },
    },
    tooltip: {
        shared: true,
        intersect: false,
        style: {
            fontFamily: "Inter, sans-serif",
        },
    },
    states: {
        hover: {
            filter: {
                type: "darken",
                value: 1,
            },
        },
    },
    stroke: {
        show: true,
        width: 0,
        colors: ["transparent"],
    },
    grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
            left: 2,
            right: 2,
            top: -14,
        },
    },
    dataLabels: {
        enabled: false,
    },
    legend: {
        show: false,
    },
    xaxis: {
        floating: false,
        labels: {
            show: true,
            style: {
                fontFamily: "Inter, sans-serif",
                cssClass:
                    "text-xs font-normal fill-gray-500 dark:fill-gray-400",
            },
        },
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
    },
    yaxis: {
        show: false,
    },
    fill: {
        opacity: 1,
    },
};

if (
    document.getElementById("column-chart") &&
    typeof ApexCharts !== "undefined"
) {
    const chart = new ApexCharts(
        document.getElementById("column-chart"),
        options
    );
    chart.render();
}
