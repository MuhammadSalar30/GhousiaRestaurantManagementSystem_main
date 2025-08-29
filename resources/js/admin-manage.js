/*
Template Name: Yum - Multipurpose Food Tailwind CSS Template
Version: 1.0
Author: coderthemes
Email: support@coderthemes.com
*/

import ApexCharts from 'apexcharts/dist/apexcharts.min.js'

var colors = ["#ffbc00"];
var options = {
    chart: {
        type: "bar",
        height: 80,
        sparkline: { enabled: true },
    },
    plotOptions: {
        bar: {
            columnWidth: "90%",
            borderRadius: 7,
        },
    },
    colors: ['#009400'],
    series: [{ data: [45, 80] }],
    labels: [1, 2],
    xaxis: { crosshairs: { width: 4 } },
    tooltip: {
        theme: 'dark',
        fixed: { enabled: false },
        x: { show: false },
        y: {
            title: {
                formatter: function (o) {
                    return "";
                },
            },
        },
        marker: { show: false },
    },
};

var chart = new ApexCharts(document.querySelector("#new_order"), options);  

chart.render();

//
var colors = ["#ffbc00"];
var options = {
    chart: {
        type: "bar",
        height: 80,
        sparkline: { enabled: true },
    },
    plotOptions: {
        bar: {
            columnWidth: "90%",
            borderRadius: 7,
        },
    },
    colors: ['#D40000'],
    series: [{ data: [45, 80] }],
    labels: [1, 2],
    xaxis: { crosshairs: { width: 4 } },
    tooltip: {
        theme: 'dark',
        fixed: { enabled: false },
        x: { show: false },
        y: {
            title: {
                formatter: function (o) {
                    return "";
                },
            },
        },
        marker: { show: false },
    },
};

var chart = new ApexCharts(document.querySelector("#cancelled_order"), options);

chart.render();