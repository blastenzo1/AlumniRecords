const options = {
    colors: [
        // "#1A56DB",
        // "#FDBA8C",
        // "#8B5CF6",
        // "#34D399",
        // "#FBBF24",
        // "#EF4444",
        // "#3B82F6",
        // "#10B981",
        // "#6366F1",
        // "#6B7280",
        // "#4ADE80",
        // "#F87171",
        // "#60A5FA",
        // "#7F9CF5",
        // "#22D3EE",
        // "#A78BFA",
        // "#F472B6",
        // "#FBB6CE",
        // "#C4B5FD",
        "#EF4444",
    ],
    series: [
        {
            name: "Number of Graduates",
            data: [
                { x: "College of Agriculture", y: 150 },
                { x: "College of Arts and Sciences", y: 200 },
                { x: "College of Business and Administration", y: 180 },
                { x: "College of Computer Studies", y: 250 },
                { x: "College of Education", y: 170 },
                { x: "College of Engineering", y: 220 },
                { x: "College of Law", y: 190 },
                { x: "College of Maritime Technology", y: 160 },
                { x: "College of Mass Communication", y: 210 },
                { x: "College of Media Arts", y: 230 },
                { x: "College of Nursing", y: 240 },
                { x: "College of Performing Visual Arts", y: 260 },
                { x: "College of Physical Therapy", y: 280 },
                { x: "Divinity", y: 120 },
                { x: "Elementary School", y: 130 },
                { x: "Institute of Environmental Sciences", y: 140 },
                { x: "School of Basic Education", y: 170 },
                { x: "School of Medicine", y: 190 },
                { x: "School of Public Affairs and Governance", y: 180 },
            ],
        },
    ],
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
            show: false,
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
