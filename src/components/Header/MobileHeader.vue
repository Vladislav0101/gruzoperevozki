<script setup>
import { onMounted, onUnmounted, ref } from 'vue'

import scrollTo from '@/utils/scrollTo.js'

import VTypography from '@/components/Common/VTypography.vue'

defineProps({
  navButtons: {
    type: Array,
    required: true
  }
})

const isBurgerActive = ref(undefined)
const isAccentedBurger = ref(false)

const isToAnimation = ref(false)
const isFromAnimation = ref(false)

const topBurgerLine = ref()
const bottomBurgerLine = ref()

const toggleBurger = () => {
  if (!isBurgerActive.value) {
    isToAnimation.value = true

    topBurgerLine.value.addEventListener(
      'animationend',
      () => {
        isToAnimation.value = false
        isBurgerActive.value = !isBurgerActive.value
      },
      { once: true }
    )
  } else if (isBurgerActive.value) {
    isBurgerActive.value = !isBurgerActive.value
    isFromAnimation.value = true

    topBurgerLine.value.addEventListener(
      'animationend',
      () => {
        isFromAnimation.value = false
      },
      { once: true }
    )
  }
}

const subscribeHeaderScroll = () => {
  const { scrollY } = window

  isAccentedBurger.value = scrollY > 0
}

const goToLink = (id) => {
  scrollTo(id)
  toggleBurger()
}

onMounted(() => {
  addEventListener('scroll', subscribeHeaderScroll)
})

onUnmounted(() => {
  removeEventListener('scroll', subscribeHeaderScroll)
})
</script>

<template>
  <div
    :class="[
      $style.headerBox,
      isBurgerActive && $style.active,
      isToAnimation && $style.animationTo,
      isFromAnimation && $style.animationFrom
    ]"
  >
    <div :class="$style.logo">
      <img src="../../assets/icons/logo.svg" alt="logo" />
    </div>

    <div :class="[$style.burger, isAccentedBurger && $style.accented]" @click="toggleBurger">
      <div>
        <div :class="$style.topLine" ref="topBurgerLine" />
        <div :class="$style.bottomLine" ref="bottomBurgerLine" />
      </div>
    </div>

    <div :class="$style.shadow" @click="toggleBurger" />

    <nav>
      <ul>
        <li v-for="button of navButtons" :key="button.id" @click="goToLink(button.id)">
          <VTypography :class="$style.navButton" weight="medium" size="l">
            {{ button.label }}
          </VTypography>
        </li>
      </ul>

      <a href="tel:+375447768306">
        <VTypography weight="medium" size="sm"> +375 (44) 776-83-06 </VTypography>
      </a>
    </nav>
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

$burger-lines-gap: 5px;
$line-height: 2px;

@keyframes topLineToActiveBurger {
  0% {
  }

  30% {
    transform: translateY(calc(($burger-lines-gap + $line-height) / 2)) rotate(0);
    background-color: $color-wet-asphalt;
  }

  100% {
    transform: translateY(calc(($burger-lines-gap + $line-height) / 2)) rotate(45deg);
    background-color: $color-wet-asphalt;
  }
}

@keyframes bottomLineToActiveBurger {
  0% {
  }

  30% {
    transform: translateY(calc(($burger-lines-gap + $line-height) / -2)) rotate(0);
    background-color: $color-wet-asphalt;
  }

  100% {
    transform: translateY(calc(($burger-lines-gap + $line-height) / -2)) rotate(-45deg);
    background-color: $color-wet-asphalt;
  }
}

.headerBox {
  display: flex;
  justify-content: space-between;
  padding-top: 10px;
  max-width: 300px;
  width: 100%;

  .logo {
    width: 50%;

    img {
      width: 100%;
    }
  }

  .burger {
    align-items: center;
    display: flex;
    justify-content: center;
    height: 40px;
    position: fixed;
    right: 3vw;
    top: 3vw;
    transition: background-color 0.1s linear;
    z-index: 999;
    width: 40px;

    &.accented {
      background-color: $color-orange;
    }

    .topLine,
    .bottomLine {
      animation-duration: 0.5s;
      animation-fill-mode: forwards;

      background-color: $color-cultured;
      height: $line-height;
      width: 20px;
    }

    .topLine {
      margin-bottom: $burger-lines-gap;
    }
  }

  .shadow {
    background-color: $color-black;
    position: fixed;
    inset: 0;
    z-index: 9;
    opacity: 0;
    visibility: hidden;
    transition: all 0.5s linear;
  }

  nav {
    display: flex;
    background-color: $color-cultured;
    bottom: 0;
    flex-direction: column;
    justify-content: space-between;
    padding: 10vh 5vw;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 9;
    width: 60vw;
    transform: translateX(60vw);
    transition: transform 0.5s linear;

    ul {
      display: flex;
      cursor: pointer;
      gap: 20px;
      flex-direction: column;
      width: max-content;

      li:hover {
        text-decoration: underline;
      }
    }
  }

  &.active {
    .burger {
      background-color: unset;

      .topLine {
        background-color: $color-wet-asphalt;
        transform: translateY(calc(($burger-lines-gap + $line-height) / 2)) rotate(45deg);
      }
      .bottomLine {
        background-color: $color-wet-asphalt;
        transform: translateY(calc(($burger-lines-gap + $line-height) / -2)) rotate(-45deg);
      }
    }

    .shadow {
      opacity: 0.75;
      visibility: visible;
    }

    nav {
      transform: translateX(0);
    }
  }

  &.animationTo {
    .burger {
      background-color: unset;

      .topLine {
        animation-name: topLineToActiveBurger;
      }
      .bottomLine {
        animation-name: bottomLineToActiveBurger;
      }
    }

    .shadow {
      opacity: 0.75;
      visibility: visible;
    }

    nav {
      transform: translateX(0);
    }
  }

  &.animationFrom {
    .burger {
      background-color: unset;
      .topLine {
        animation-name: topLineToActiveBurger;
        animation-direction: reverse;
      }
      .bottomLine {
        animation-name: bottomLineToActiveBurger;
        animation-direction: reverse;
      }
    }
  }
}
</style>
