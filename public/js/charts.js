$(function () {
    /* ChartJS */
    'use strict';
    if ($("#mixed-chart").length) {
      var chartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          type: 'line',
          label: 'Revenue',
          data: ["23", "33", "32", "65", "21", "45", "35"],
          backgroundColor: ChartColor[2],
          borderColor: ChartColor[2],
          borderWidth: 3,
          fill: false,
        }, {
          type: 'bar',
          label: 'Standard',
          data: ["53", "28", "19", "29", "30", "51", "55"],
          backgroundColor: ChartColor[0],
          borderColor: ChartColor[0],
          borderWidth: 2
        }, {
          type: 'bar',
          label: 'Extended',
          data: ["34", "16", "46", "54", "42", "31", "49"],
          backgroundColor: ChartColor[1],
          borderColor: ChartColor[1]
        }]
      };
      var MixedChartCanvas = document.getElementById('mixed-chart').getContext('2d');
      lineChart = new Chart(MixedChartCanvas, {
        type: 'bar',
        data: chartData,
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Revenue and number of lincences sold'
          },
          scales: {
            xAxes: [{
              display: true,
              ticks: {
                fontColor: '#212229',
                stepSize: 50,
                min: 0,
                max: 150,
                autoSkip: true,
                autoSkipPadding: 15,
                maxRotation: 0,
                maxTicksLimit: 10
              },
              gridLines: {
                display: false,
                drawBorder: false,
                color: 'transparent',
                zeroLineColor: '#eeeeee'
              }
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Number of Sales',
                fontSize: 12,
                lineHeight: 2
              },
              ticks: {
                fontColor: '#212229',
                display: true,
                autoSkip: false,
                maxRotation: 0,
                stepSize: 20,
                min: 0,
                max: 100
              },
              gridLines: {
                drawBorder: false
              }
            }]
          },
          legend: {
            display: false
          },
          legendCallback: function (chart) {
            var text = [];
            text.push('<div class="chartjs-legend d-flex justify-content-center mt-4"><ul>');
            for (var i = 0; i < chart.data.datasets.length; i++) {              
              text.push('<li>');
              text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
              text.push(chart.data.datasets[i].label);
              text.push('</li>');
            }
            text.push('</ul></div>');
            return text.join("");
          }
        }
      });
      document.getElementById('mixed-chart-legend').innerHTML = lineChart.generateLegend();
    }
    if ($("#lineChart").length) {
      var lineData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
        datasets: [{
          data: [0, 205, 75, 150, 100, 150, 50, 100, 80],
          backgroundColor: ChartColor[0],
          borderColor: ChartColor[0],
          borderWidth: 3,
          fill: 'false',
          label: "Sales"
        }]
      };
      var lineOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Month',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              fontColor: '#212229',
              stepSize: 50,
              min: 0,
              max: 150,
              autoSkip: true,
              autoSkipPadding: 15,
              maxRotation: 0,
              maxTicksLimit: 10
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Number of sales',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              fontColor: '#212229',
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 100,
              min: 0,
              max: 300
            },
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets.length; i++) {            
            text.push('<li>');
            text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
            text.push(chart.data.datasets[i].label);
            text.push('</li>');
          }
          text.push('</ul></div>');
          return text.join("");
        },
        elements: {
          line: {
            tension: 0
          },
          point: {
            radius: 0
          }
        }
      }
      var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineData,
        options: lineOptions
      });
      document.getElementById('line-traffic-legend').innerHTML = lineChart.generateLegend();
    }
    if ($("#areaChart").length) {
      var gradientStrokeFill_1 = lineChartCanvas.createLinearGradient(1, 2, 1, 280);
      gradientStrokeFill_1.addColorStop(0, "rgba(20, 88, 232, 0.37)");
      gradientStrokeFill_1.addColorStop(1, "rgba(255,255,255,0.4)")
      var lineData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
        datasets: [{
          data: [0, 205, 75, 150, 100, 150, 50, 100, 80],
          backgroundColor: gradientStrokeFill_1,
          borderColor: ChartColor[0],
          borderWidth: 3,
          fill: true,
          label: "Marketing"
        }]
      };
      var lineOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Month',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              autoSkip: true,
              autoSkipPadding: 35,
              maxRotation: 0,
              maxTicksLimit: 10,
              fontColor: '#212229'
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Number of user',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              stepSize: 100,
              min: 0,
              max: 300
            },
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets.length; i++) {            
            text.push('<li>');
            text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
            text.push(chart.data.datasets[i].label);
            text.push('</li>');
          }
          text.push('</ul></div>');
          return text.join("");
        },
        elements: {
          line: {
            tension: 0
          },
          point: {
            radius: 0
          }
        }
      }
      var lineChartCanvas = $("#areaChart").get(0).getContext("2d");
      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineData,
        options: lineOptions
      });
      document.getElementById('area-traffic-legend').innerHTML = lineChart.generateLegend();
    }

    // BAR CHART
    if ($("#barChart").length) {
      var barChartCanvas = $("#barChart").get(0).getContext("2d");
      var total_1 = parseInt(($("#total_01").attr("total_mes"))!=undefined? $("#total_01").attr("total_mes"): "0");

      var total_2 = parseInt(($("#total_02").attr("total_mes"))!=undefined? $("#total_02").attr("total_mes"): "0");
      var total_3 = parseInt(($("#total_03").attr("total_mes"))!=undefined? $("#total_03").attr("total_mes"): "0");
      var total_4 = parseInt(($("#total_04").attr("total_mes"))!=undefined? $("#total_04").attr("total_mes"): "0");
      var total_5 = parseInt(($("#total_05").attr("total_mes"))!=undefined? $("#total_05").attr("total_mes"): "0");
      var total_6 = parseInt(($("#total_06").attr("total_mes"))!=undefined? $("#total_06").attr("total_mes"): "0");
      var total_7 = parseInt(($("#total_07").attr("total_mes"))!=undefined? $("#total_07").attr("total_mes"): "0");
      var total_8 = parseInt(($("#total_08").attr("total_mes"))!=undefined? $("#total_08").attr("total_mes"): "0");
      var total_9 = parseInt(($("#total_09").attr("total_mes"))!=undefined? $("#total_09").attr("total_mes"): "0");
      var total_10 = parseInt(($("#total_10").attr("total_mes"))!=undefined? $("#total_10").attr("total_mes"): "0");
      var total_11 = parseInt(($("#total_11").attr("total_mes"))!=undefined? $("#total_11").attr("total_mes"): "0");
      var total_12 = parseInt(($("#total_12").attr("total_mes"))!=undefined? $("#total_12").attr("total_mes"): "0");

      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: {
          labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          datasets: [{
            label: 'USD mensual',
            data: [total_1, total_2, total_3, total_4, total_5, total_6, total_7, total_8, total_9, total_10, total_11, total_12],
            backgroundColor: ChartColor[0],
            borderColor: ChartColor[0],
            borderWidth: 0
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: true,
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Mes',
                fontSize: 12,
                lineHeight: 2
              },
              ticks: {
                fontColor: '#bfccda',
                stepSize: 100000,
                min: 0,
                max: 1000000,
                autoSkip: true,
                autoSkipPadding: 15,
                maxRotation: 0,
                maxTicksLimit: 10
              },
              gridLines: {
                display: false,
                drawBorder: false,
                color: 'transparent',
                zeroLineColor: '#eeeeee'
              }
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Total USD',
                fontSize: 12,
                lineHeight: 2
              },
              ticks: {
                display: true,
                autoSkip: false,
                maxRotation: 0,
                fontColor: '#bfccda',
                stepSize: 100000,
                min: 0,
                max: 1000000
              },
              gridLines: {
                drawBorder: false
              }
            }]
          },
          legend: {
            display: false
          },
          legendCallback: function (chart) {
            var text = [];
            text.push('<div class="chartjs-legend"><ul>');
            for (var i = 0; i < chart.data.datasets.length; i++) {              
              text.push('<li>');
              text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
              text.push(chart.data.datasets[i].label);
              text.push('</li>');
            }
            text.push('</ul></div>');
            return text.join("");
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
      });
      document.getElementById('bar-traffic-legend').innerHTML = barChart.generateLegend();
    }
    if ($("#stackedbarChart").length) {
      var stackedbarChartCanvas = $("#stackedbarChart").get(0).getContext("2d");
      var stackedbarChart = new Chart(stackedbarChartCanvas, {
        type: 'bar',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
          datasets: [{
              label: "Desktop",
              backgroundColor: ChartColor[0],
              borderColor: ChartColor[0],
              borderWidth: 1,
              data: [55, 45, 44, 54, 38, 40, 50]
            },
            {
              label: "Mobile",
              backgroundColor: ChartColor[1],
              borderColor: ChartColor[1],
              borderWidth: 1,
              data: [34, 20, 54, 34, 65, 40, 35]
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: true,
          legend: false,
          categoryPercentage: 0.5,
          stacked: true,
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'User by time',
                fontSize: 12,
                lineHeight: 2
              },
              ticks: {
                fontColor: '#bfccda',
                stepSize: 50,
                min: 0,
                max: 150,
                autoSkip: true,
                autoSkipPadding: 15,
                maxRotation: 0,
                maxTicksLimit: 10
              },
              gridLines: {
                display: false,
                drawBorder: false,
                color: 'transparent',
                zeroLineColor: '#eeeeee'
              }
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Number of users',
                fontSize: 12,
                lineHeight: 2
              },
              ticks: {
                fontColor: '#bfccda',
                stepSize: 50,
                min: 0,
                max: 150,
                autoSkip: true,
                autoSkipPadding: 15,
                maxRotation: 0,
                maxTicksLimit: 10
              },
              gridLines: {
                drawBorder: false
              }
            }]
          },
          legend: {
            display: false
          },
          legendCallback: function (chart) {
            var text = [];
            text.push('<div class="chartjs-legend"><ul>');
            for (var i = 0; i < chart.data.datasets.length; i++) {              
              text.push('<li>');
              text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
              text.push(chart.data.datasets[i].label);
              text.push('</li>');
            }
            text.push('</ul></div>');
            return text.join("");
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
      });
      document.getElementById('stacked-bar-traffic-legend').innerHTML = stackedbarChart.generateLegend();
    }
    if ($("#radarChart").length) {
      var marksCanvas = document.getElementById("radarChart");
      var marksData = {
        labels: ["English", "Maths", "Physics", "Chemistry", "Biology", "History"],
        datasets: [{
          label: "Student A",
          backgroundColor: ChartColor[0],
          borderColor: ChartColor[0],
          borderWidth: 0,
          fill: true,
          radius: 6,
          pointRadius: 5,
          pointBorderWidth: 0,
          pointBackgroundColor: ChartColor[4],
          pointHoverRadius: 10,
          data: [54, 45, 60, 70, 54, 75]
        }, {
          label: "Student B",
          backgroundColor: ChartColor[1],
          borderColor: ChartColor[1],
          borderWidth: 0,
          fill: true,
          radius: 6,
          pointRadius: 5,
          pointBorderWidth: 0,
          pointBackgroundColor: ChartColor[1],
          pointHoverRadius: 10,
          data: [65, 75, 70, 80, 60, 80]
        }]
      };
  
      var chartOptions = {
        scale: {
          ticks: {
            beginAtZero: true,
            min: 0,
            max: 100,
            stepSize: 20,
            display: false,
          },
          pointLabels: {
            fontSize: 14
          }
        },
        legend: false,
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets.length; i++) {
            text.push('<li>');
            text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
            text.push(chart.data.datasets[i].label);
            text.push('</li>');
          }
          text.push('</ul></div>');
          return text.join("");
        },
      };
  
      var radarChart = new Chart(marksCanvas, {
        type: 'radar',
        data: marksData,
        options: chartOptions
      });
      document.getElementById('radar-chart-legend').innerHTML = radarChart.generateLegend();
    }
    if ($("#doughnutChart").length) {
      var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
      var doughnutPieData = {
        datasets: [{
          data: [parseInt($("#creadas_total").text()), parseInt($("#enviadas_total").text())],
          backgroundColor: [
            ChartColor[1],
            ChartColor[2]
          ],
          borderColor: [
            ChartColor[1],
            ChartColor[2]
          ],
        }],
  
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
          'Creadas',
          'Enviadas',
        ]
      };
      var doughnutPieOptions = {
        cutoutPercentage: 75,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
        maintainAspectRatio: true,
        showScale: true,
        legend: false,
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
            text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
            text.push('</span>');
            if (chart.data.labels[i]) {
              text.push(chart.data.labels[i]);
            }
            text.push('</li>');
          }
          text.push('</div></ul>');
          return text.join("");
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        }
      };




      // pie chart
      var doughnutChart = new Chart(doughnutChartCanvas, {
        type: 'doughnut',
        data: doughnutPieData,
        options: doughnutPieOptions
      });
      document.getElementById('doughnut-chart-legend').innerHTML = doughnutChart.generateLegend();
    }


    if ($("#pieChart").length) {
      var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
      var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: {
          datasets: [{
            data: [parseInt($("#creadas_total").text()), parseInt($("#enviadas_total").text())],
            backgroundColor: [
              ChartColor[1],
              ChartColor[2]
            ],
            borderColor: [
              ChartColor[1],
              ChartColor[2]
            ],
          }],
          labels: [
            'Creadas',
            'Enviadas',
          ]
        },
        options: {
          responsive: true,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          legendCallback: function (chart) {
            var text = [];
            text.push('<div class="chartjs-legend"><ul>');
            for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
              text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
              text.push('</span>');
              if (chart.data.labels[i]) {
                text.push(chart.data.labels[i]);
              }
              text.push('</li>');
            }
            text.push('</div></ul>');
            return text.join("");
          }
        }
      });
      document.getElementById('pie-chart-legend').innerHTML = pieChart.generateLegend();
    }
    if ($('#scatterChart').length) {
      var options = {
        type: 'bubble',
        data: {
          datasets: [{
              label: 'John',
              data: [{
                x: 3,
                y: 10,
                r: 5
              }],
              backgroundColor: ChartColor[0],
              borderColor: ChartColor[0],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[0]
            },
            {
              label: 'Paul',
              data: [{
                x: 2,
                y: 2,
                r: 10
              }],
              backgroundColor: ChartColor[1],
              borderColor: ChartColor[1],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[1]
            }, {
              label: 'Paul',
              data: [{
                x: 12,
                y: 32,
                r: 13
              }],
              backgroundColor: ChartColor[2],
              borderColor: ChartColor[2],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[2]
            },
            {
              label: 'Paul',
              data: [{
                x: 29,
                y: 52,
                r: 5
              }],
              backgroundColor: ChartColor[0],
              borderColor: ChartColor[0],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[0]
            },
            {
              label: 'Paul',
              data: [{
                x: 49,
                y: 62,
                r: 5
              }],
              backgroundColor: ChartColor[1],
              borderColor: ChartColor[1],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[1]
            },
            {
              label: 'Paul',
              data: [{
                x: 22,
                y: 22,
                r: 5
              }],
              backgroundColor: ChartColor[2],
              borderColor: ChartColor[2],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[2]
            },
            {
              label: 'Paul',
              data: [{
                x: 23,
                y: 25,
                r: 5
              }],
              backgroundColor: ChartColor[1],
              borderColor: ChartColor[1],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[1]
            },
            {
              label: 'Paul',
              data: [{
                x: 12,
                y: 10,
                r: 5
              }],
              backgroundColor: ChartColor[1],
              borderColor: ChartColor[1],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[1]
            },
            {
              label: 'Paul',
              data: [{
                x: 34,
                y: 23,
                r: 5
              }],
              backgroundColor: ChartColor[1],
              borderColor: ChartColor[1],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[1]
            },
            {
              label: 'Paul',
              data: [{
                x: 30,
                y: 20,
                r: 10
              }],
              backgroundColor: ChartColor[1],
              borderColor: ChartColor[1],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[1]
            },
            {
              label: 'Paul',
              data: [{
                x: 12,
                y: 17,
                r: 5
              }],
              backgroundColor: ChartColor[1],
              borderColor: ChartColor[1],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[1]
            },
            {
              label: 'Paul',
              data: [{
                x: 32,
                y: 37,
                r: 5
              }],
              backgroundColor: ChartColor[0],
              borderColor: ChartColor[0],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[0]
            },
            {
              label: 'Paul',
              data: [{
                x: 52,
                y: 57,
                r: 5
              }],
              backgroundColor: ChartColor[0],
              borderColor: ChartColor[0],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[0]
            },
            {
              label: 'Paul',
              data: [{
                x: 77,
                y: 40,
                r: 5
              }],
              backgroundColor: ChartColor[0],
              borderColor: ChartColor[0],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[0]
            }, {
              label: 'Paul',
              data: [{
                x: 67,
                y: 40,
                r: 5
              }],
              backgroundColor: ChartColor[0],
              borderColor: ChartColor[0],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[0]
            }, {
              label: 'Paul',
              data: [{
                x: 47,
                y: 20,
                r: 10
              }],
              backgroundColor: ChartColor[0],
              borderColor: ChartColor[0],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[0]
            }, {
              label: 'Paul',
              data: [{
                x: 77,
                y: 10,
                r: 5
              }],
              backgroundColor: ChartColor[0],
              borderColor: ChartColor[0],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[0]
            }, {
              label: 'Paul',
              data: [{
                x: 57,
                y: 10,
                r: 10
              }],
              backgroundColor: ChartColor[0],
              borderColor: ChartColor[0],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[0]
            }, {
              label: 'Paul',
              data: [{
                x: 57,
                y: 40,
                r: 5
              }],
              backgroundColor: ChartColor[3],
              borderColor: ChartColor[3],
              borderWidth: 0,
              hoverBackgroundColor: ChartColor[3]
            }
          ]
        },
        options: {
          legend: false,
          scales: {
            xAxes: [{
              gridLines: {
                display: false,
                color: '#fff',
              },
              ticks: {
                autoSkip: true,
                autoSkipPadding: 45,
                maxRotation: 0,
                maxTicksLimit: 10,
                fontColor: '#212229'
              }
            }],
            yAxes: [{
              gridLines: {
                color: '#eff2ff',
                display: true
              },
              ticks: {
                beginAtZero: true,
                stepSize: 25,
                max: 100,
                fontColor: '#212229'
              }
            }]
          },
          legend: {
            display: false
          },
          legendCallback: function (chart) {
            var text = [];
            text.push('<div class="chartjs-legend"><ul>');
            for (var i = 0; i < chart.data.datasets.length; i++) {              
              text.push('<li>');
              text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
              text.push(chart.data.datasets[i].label);
              text.push('</li>');
            }
            text.push('</ul></div>');
            return text.join("");
          },
        }
      }
  
      var ctx = document.getElementById('scatterChart').getContext('2d');
      new Chart(ctx, options);
      document.getElementById('scatter-chart-legend').innerHTML = barChart.generateLegend();
    }
  });