<script setup>
import xss from 'xss'

import scrollTo from '@/utils/scrollTo.js'

import VTypography from '@/components/Common/VTypography.vue'
import VButton from '@/components/Common/VButton.vue'

defineProps({
  title: {
    type: String,
    default: ''
  }
})
</script>

<template>
  <div :class="$style.serviceCard">
    <div :class="$style.image">
      <slot name="image" />
    </div>

    <div :class="$style.info">
      <div :class="$style.text">
        <VTypography :class="$style.title" size="xl" weight="semiBold" v-html="xss(title)" />

        <slot name="price" />

        <VTypography>
          <slot name="description" />
        </VTypography>
      </div>

      <VButton>
        <VTypography color="cultured" @click="scrollTo('contacts')">ЗАКАЗАТЬ</VTypography>
      </VButton>
    </div>
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

.serviceCard {
  background-color: $color-light-grey;
  display: grid;
  grid-template-rows: max-content auto;
  overflow: hidden;
  transition: all 0.1s linear;

  .info {
    align-items: end;
    display: flex;
    gap: 40px;
    flex-direction: column;
    padding: 30px;
    justify-content: space-between;

    .text {
      display: grid;
      gap: 10px;
    }

    button p {
      font-size: 18px;
    }
  }

  .price {
    align-items: center;
    display: flex;
    gap: 10px;
    padding: 0 30px 20px 30px;
  }

  .image {
    height: 300px;

    img {
      object-fit: cover;
      height: 100%;
      width: 100%;
    }
  }
}

@media screen and (max-width: 1220px) {
  .serviceCard {
    .info {
      gap: 20px;
      padding: 15px;

      .text {
        gap: 5px;
      }
    }

    .image {
      height: 200px;
    }
  }
}

@media screen and (max-width: 980px) {
  .serviceCard {
    max-width: 400px;
  }
}

@media screen and (max-width: 620px) {
  .serviceCard {
    .info {
      gap: 15px;

      .text {
        p:nth-child(1) {
          font-size: 20px;
        }

        p:nth-child(2) {
          font-size: 12px;
        }

        p:nth-child(3) {
          font-size: 14px;
          line-height: 1.3;
        }
      }

      button p {
        font-size: 16px;
      }
    }
  }
}
</style>
