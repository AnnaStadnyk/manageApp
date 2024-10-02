<template>
  <TheSection hero="true">
    <template #title>
      <h1 class="text-4xl text-headline font-semibold text-center xl:text-5xl/[4rem] lg:text-left">
        Lorem ipsum dolor sit amet consectetur adipisicing.
      </h1>
      <p class="text-center lg:text-left">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, aut! Perferendis placeat minus praesentium dolorem.
      </p>
      <TheButton
        @click="toogleContact"
        mode="brand"
        isShadow="true"
        class="self-center lg:self-start"
        >Lorem ipsum</TheButton
      >
    </template>
    <template #description>
      <div
        class="grid grid-rows-[repeat(3,260px)] sm:grid-cols-[repeat(2,minmax(0,280px))] sm:grid-rows-[repeat(2,1fr)] gap-4 justify-center"
      >
        <TheChart>
          <canvas id="barChart" class="bg-primary-light"></canvas>
        </TheChart>
        <TheChart>
          <canvas id="doughnutChart"></canvas>
        </TheChart>
        <TheChart
          class="h-full sm:col-span-2 sm:w-1/2 sm:justify-self-center grid grid-cols-2 grid-rows-[1.5fr_1fr] gap-3 lg:gap-3.5"
        >
          <div class="col-span-2 bg-primary-light p-3.5 flex">
            <span class="self-end font-oxygen text-5xl text-headline">89.74%</span>
          </div>
          <div class="bg-brand text-white p-3.5 flex">
            <span class="self-end font-oxygen text-xl">+1.5%</span>
          </div>
          <div class="bg-primary-light p-3.5 flex">
            <span class="self-end font-oxygen text-xl text-headline">88.24%</span>
          </div>
        </TheChart>
      </div>
    </template>
  </TheSection>
</template>

<script>
import Chart from 'chart.js/auto'
import TheChart from '@/components/UI/TheChart.vue'
import TheSection from '@/components/UI/TheSection.vue'

export default {
  components: {
    TheChart,
    TheSection
  },
  emits: ['show-contact'],
  methods: {
    ctxResize() {
      for (let id in Chart.instances) {
        Chart.instances[id].resize()
      }
    },
    toogleContact() {
      this.$emit('show-contact')
    }
  },
  mounted() {
    const ctx = document.getElementById('barChart')
    new Chart(ctx, {
      type: 'bar',

      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple'],
        datasets: [
          {
            data: [
              { x: 0, y: 19 },
              { x: 1, y: 9 },
              { x: 2, y: null },
              { x: 3, y: 23 },
              { x: 4, y: 17 }
            ],
            backgroundColor: ['#263056'],
            order: 1
          },
          {
            data: [
              { x: 0, y: 12 },
              { x: 1, y: null },
              { x: 2, y: null },
              { x: 3, y: 17 },
              { x: 4, y: 12 }
            ],
            backgroundColor: ['#f0623a'],
            order: 0
          },
          {
            data: [
              { x: 0, y: null },
              { x: 1, y: null },
              { x: 2, y: -6 },
              { x: 3, y: null },
              { x: 4, y: null }
            ],
            backgroundColor: ['#263056'],
            order: 0
          },
          {
            data: [
              { x: 0, y: null },
              { x: 1, y: -4 },
              { x: 2, y: -9 },
              { x: 3, y: null },
              { x: 4, y: null }
            ],
            backgroundColor: ['#f0623a'],
            order: 1
          }
        ]
      },
      options: {
        aspectRatio: 1,
        barPercentage: 0.75,
        borderRadius: {
          topLeft: 8,
          topRight: 8,
          bottomLeft: 8,
          bottomRight: 8
        },
        layout: {
          padding: 8
        },
        scales: {
          x: {
            stacked: true,
            ticks: {
              display: false
            },

            border: {
              display: false
            },
            grid: {
              display: false
            }
          },
          y: {
            beginAtZero: true,
            ticks: {
              display: false
            },
            border: {
              display: false
            },
            grid: {
              drawTicks: false,
              color: (context) => {
                if (context.tick.value === 0) {
                  return 'rgba(36, 45, 82, 0.6)'
                }
                return '#e4e4e4'
              }
            }
          }
        },
        plugins: {
          legend: { display: false },
          tooltip: { enabled: false }
        },
        hover: {
          mode: null
        }
      }
    })

    const ctx2 = document.getElementById('doughnutChart')
    new Chart(ctx2, {
      type: 'doughnut',

      data: {
        labels: ['Red', 'Blue'],
        datasets: [
          {
            data: [30, 70],
            backgroundColor: ['#f25f3a', '#242d52']
          }
        ]
      },
      options: {
        radius: 85,
        rotation: -15,
        aspectRatio: 1,
        layout: {
          padding: 8
        },
        plugins: {
          legend: { display: false },
          tooltip: { enabled: false }
        },
        hover: {
          mode: null
        }
      }
    })
  },
  created() {
    window.addEventListener('resize', this.ctxResize)
  },
  beforeUnmount() {
    window.removeEventListener('resize', this.ctxResize)
  }
}
</script>
