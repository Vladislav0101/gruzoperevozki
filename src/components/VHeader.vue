<script setup>
import { onMounted, onUnmounted, ref } from 'vue'

import scrollTo from '@/utils/scrollTo.js'

import VTypography from '@/components/Common/VTypography.vue'
import VButton from '@/components/Common/VButton.vue'

const header = ref()
const isSimplifiedHeader = ref(false)

const navButtons = [
  {
    label: 'УСЛУГИ',
    id: 'services',
    mobileIcon: 'src/assets/icons/mobile-services.svg'
  },
  {
    label: 'ЦЕНЫ',
    id: 'prices',
    mobileIcon: 'src/assets/icons/mobile-prices.svg'
  },
  {
    label: 'ПРЕИМУЩЕСТВА',
    id: 'advantages',
    mobileIcon: 'src/assets/icons/mobile-advantages.svg'
  },
  {
    label: 'КОНТАКТЫ',
    id: 'contacts',
    mobileIcon: 'src/assets/icons/mobile-phone.svg'
  }
]

const subscribeHeaderScroll = () => {
  const { scrollY } = window

  isSimplifiedHeader.value = scrollY > 0
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
  <div :class="$style.headerBox">
    <div :class="$style.container">
      <header :class="[isSimplifiedHeader && $style.simplifiedHeader]" ref="header">
        <div :class="$style.logo">
          <img src="../assets/icons/logo.svg" alt="logo" />
        </div>

        <nav>
          <ul>
            <li v-for="button of navButtons" :key="button.id" @click="scrollTo(button.id)">
              <VTypography :class="$style.navButton" size="l" color="cultured">
                {{ button.label }}
              </VTypography>

              <img :src="button.mobileIcon" :alt="button.label" />
            </li>
          </ul>
        </nav>

        <div :class="$style.contact">
          <a href="tel:+375447768306">
            <VTypography size="l" color="cultured"> +375 (44) 776-83-06 </VTypography>
          </a>
          <img src="../assets/icons/phone.svg" alt="phone" />
        </div>
      </header>

      <div>
        <div :class="$style.preview">
          <div :class="$style.title">
            <VTypography size="headline" weight="medium" color="orange">
              Ваш груз – наша забота
            </VTypography>
            <VTypography weight="light" color="cultured" size="s28">
              грузоперевозки, которым можно доверять
            </VTypography>
          </div>

          <div :class="$style.order">
            <VButton mode="empty" @click="scrollTo('contacts')">ЗАКАЗАТЬ</VButton>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div v-if="isSimplifiedHeader" :class="$style.headerCap"></div> -->
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

$header-height: 100px;

.simplifiedHeader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
}

.headerBox {
  background-image: url(../assets/images/main-back.png);
  background-repeat: no-repeat;
  background-position: 70%;
  background-size: cover;

  .container {
    display: grid;
    min-height: 70vh;
  }

  header {
    align-items: center;
    display: flex;
    justify-content: space-between;
    height: $header-height;
    position: relative;
    transition: all 0.15s linear;

    .logo {
      width: 250px;
      img {
        width: 100%;
      }
    }

    nav {
      ul {
        display: grid;
        grid-template-columns: repeat(4, auto);
        justify-content: space-around;

        li {
          cursor: pointer;
          margin: 0 20px;
          transition: all 0.5s linear;

          :hover {
            text-decoration: underline;
          }

          img {
            display: none;
          }
        }
      }
    }

    .contact {
      align-items: center;
      display: flex;
      gap: 10px;
      transition: all 0.5s linear;

      :hover {
        text-decoration: underline;
      }

      img {
        width: 20px;
      }
    }
  }

  .preview {
    // display: grid;
    display: flex;
    justify-content: space-between;
    grid-template-columns: max-content auto;
    padding: 60px 0;

    .title {
      display: flex;
      gap: 10px;
      flex-direction: column;
      justify-content: center;
    }

    .order {
      display: flex;
      align-items: end;
      position: relative;
    }
  }
}

@media screen and (max-width: $desktop-point) {
  .headerBox {
    header {
      height: 60px;
      padding-bottom: 10px;
      padding-top: 10px;

      .logo {
        width: 20%;

        img {
          max-width: 160px;
        }
      }

      nav ul li {
        margin: 0 8px;
      }

      .contact {
        gap: 5px;

        img {
          width: 15px;
        }
      }
    }

    .preview .title {
      gap: 0;
    }
  }
}

@media screen and (max-width: $tablet-point) {
  .headerBox {
    .container {
      min-height: 40vh;
    }

    header {
      .logo {
        width: 30%;
      }

      nav ul li {
        margin: 0 15px;

        .navButton {
          display: none;
        }

        img {
          display: block;
          width: 30px;
          height: 30px;
        }
      }

      .contact {
        display: none;
      }
    }

    .preview {
      gap: 30px;
      flex-direction: column;
    }
  }
}

// .headerCap {
//   height: $header-height;
// }
</style>
