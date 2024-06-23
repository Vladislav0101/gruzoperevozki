<script setup>
import { onMounted, onUnmounted, ref } from 'vue'

import scrollTo from '@/utils/scrollTo.js'

import VTypography from '@/components/Common/VTypography.vue'
import VButton from '@/components/Common/VButton.vue'
import MobileHeader from '@/components/Header/MobileHeader.vue'

const header = ref()
const isSimplifiedHeader = ref(false)

const navButtons = [
  {
    label: 'УСЛУГИ',
    id: 'services'
  },
  {
    label: 'ЦЕНЫ',
    id: 'prices'
  },
  {
    label: 'ПРЕИМУЩЕСТВА',
    id: 'advantages'
  },
  {
    label: 'КОНТАКТЫ',
    id: 'contacts'
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
      <header :class="[isSimplifiedHeader && $style.simplifiedHeader, $style.desktop]" ref="header">
        <div :class="$style.logo">
          <img src="../../assets/icons/logo.svg" alt="logo" />
        </div>

        <nav>
          <ul>
            <li v-for="button of navButtons" :key="button.id" @click="scrollTo(button.id)">
              <VTypography :class="$style.navButton" color="cultured">
                {{ button.label }}
              </VTypography>
            </li>
          </ul>
        </nav>

        <div :class="$style.contact">
          <a href="tel:+375447768306">
            <VTypography color="cultured"> +375 (44) 776-83-06 </VTypography>
          </a>
          <img src="../../assets/icons/phone.svg" alt="phone" />
        </div>
      </header>

      <MobileHeader :class="$style.mobile" :nav-buttons="navButtons" />

      <div>
        <div :class="$style.preview">
          <div :class="$style.title">
            <VTypography weight="medium" color="orange"> Ваш груз – наша забота </VTypography>
            <VTypography weight="light" color="cultured">
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
  background-image: url('../../assets/images/main-back.png');
  background-repeat: no-repeat;
  background-position: 70%;
  background-size: cover;
  position: relative;

  .container {
    display: grid;
    min-height: 70vh;

    .desktop {
      display: inherit;
    }

    .mobile {
      display: none;
    }

    @media screen and (max-width: 950px) {
      min-height: 60vh;
    }

    @media screen and (max-width: 768px) {
      min-height: 400px;

      .desktop {
        display: none;
      }

      .mobile {
        display: flex;
      }
    }
  }

  header {
    align-items: center;
    display: grid;
    justify-content: space-between;
    gap: 2%;
    grid-template-columns: 20% 50% max-content;
    height: $header-height;
    position: relative;
    transition: all 0.15s linear;

    .logo img {
      width: 100%;
    }

    nav {
      ul {
        display: grid;
        grid-template-columns: repeat(4, auto);
        justify-content: space-around;

        li {
          cursor: pointer;
          transition: all 0.5s linear;

          .navButton {
            font-size: 20px;

            @media screen and (max-width: 1100px) {
              font-size: 18px;
            }

            @media screen and (max-width: 980px) {
              font-size: 16px;
            }

            @media screen and (max-width: 850px) {
              font-size: 14px;
            }
          }

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

      p {
        font-size: 20px;

        @media screen and (max-width: 1100px) {
          font-size: 18px;
        }

        @media screen and (max-width: 980px) {
          font-size: 16px;
        }

        @media screen and (max-width: 850px) {
          font-size: 14px;
        }
      }

      @media screen and (max-width: 980px) {
        gap: 8px;

        img {
          width: 16px;
        }
      }
    }

    @media screen and (max-width: 1100px) {
      height: 80px;
    }

    @media screen and (max-width: 980px) {
      height: 70px;
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

      p:nth-child(1) {
        font-size: 60px;
      }

      p:nth-child(2) {
        font-size: 28px;
      }

      @media screen and (max-width: 1100px) {
        gap: 5px;

        p:nth-child(1) {
          font-size: 50px;
        }

        p:nth-child(2) {
          font-size: 24px;
        }
      }

      @media screen and (max-width: 950px) {
        p:nth-child(1) {
          font-size: 40px;
        }

        p:nth-child(2) {
          font-size: 20px;
        }
      }
    }

    .order {
      display: flex;
      align-items: end;
      position: relative;

      button {
        font-size: 24px;

        @media screen and (max-width: 1100px) {
          font-size: 22px;
        }

        @media screen and (max-width: 950px) {
          font-size: 20px;
        }

        @media screen and (max-width: $tablet-point) {
          font-size: 16px;
        }
      }
    }

    @media screen and (max-width: $desktop-point) {
      gap: 50px;
      flex-direction: column;

      .title {
        gap: 0;

        p:nth-child(1) {
          font-size: 28px;
        }

        p:nth-child(2) {
          font-size: 16px;
        }
      }

      .order {
        justify-content: end;
      }
    }
  }
}
</style>
