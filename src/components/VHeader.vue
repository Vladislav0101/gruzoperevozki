<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue'

import VTypography from '@/components/Common/VTypography.vue'

const header = ref()
const isSimplifiedHeader = ref(false)

const navButtons = [
  {
    label: 'Услуги',
    id: 'services'
  },
  {
    label: 'Цены',
    id: 'prices'
  },
  {
    label: 'Преимущества',
    id: 'advantages'
  },
  {
    label: 'Контакты',
    id: 'contacts'
  }
]

const subscribeHeaderScroll = () => {
  const { scrollY } = window

  isSimplifiedHeader.value = scrollY > 0
}

const scrollTo = (id) => {
  const scrollToY = document.getElementById(id).offsetTop - 100
  window.scrollTo({ top: scrollToY, behavior: 'smooth' })
  // document.querySelector(anchor).scrollIntoView({ behavior: 'smooth' })
}

// TODO: добавить подсвечивание текующего блока
// const headerObserver = ref()
// const observeHeader = () => {
//   headerObserver.value = new IntersectionObserver(
//     () => {
//       console.log('headerObserver')
//     },
//     {
//       root: document.querySelector('[data-target]'),
//       rootMargin: '60px',
//       threshold: 1.0
//     }
//   )

//   headerObserver.value.observe(header.value)
// }

onMounted(() => {
  addEventListener('scroll', subscribeHeaderScroll)
})

onUnmounted(() => {
  removeEventListener('scroll', subscribeHeaderScroll)
})
</script>

<template>
  <header :class="isSimplifiedHeader && $style.simplifiedHeader" ref="header">
    <div :class="[$style.container, $style.headerBox]">
      <VTypography
        tag="h1"
        size="large"
        weight="bold"
        font="merriweather"
        color="cultured"
        :class="$style.logo"
      >
        Dima Vozit
      </VTypography>

      <nav>
        <ul>
          <li v-for="button of navButtons" :key="button.id">
            <VTypography size="l" font="merriweather" color="cultured" @click="scrollTo(button.id)">
              {{ button.label }}
            </VTypography>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <div v-if="isSimplifiedHeader" :class="$style.headerCap"></div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

$header-height: 100px;

header {
  position: relative;
  transition: all 0.15s linear;
}

.simplifiedHeader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
}

.headerBox {
  align-items: center;
  display: grid;
  grid-template-columns: repeat(2, max-content);
  justify-content: space-between;
  height: $header-height;
  background-color: #34495e;

  nav {
    ul {
      display: grid;
      grid-template-columns: repeat(4, auto);
      justify-content: space-around;

      li {
        cursor: pointer;
        margin: 0 35px;
        transition: all 0.5s linear;

        :hover {
          color: $color-orange;
        }
      }
    }
  }
}

.headerCap {
  height: $header-height;
}
</style>
