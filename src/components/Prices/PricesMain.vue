<script setup>
import scrollTo from '@/utils/scrollTo.js'

import VTypography from '@/components/Common/VTypography.vue'
import VUnderline from '@/components/Common/VUnderline.vue'

const tariffs = [
  {
    price: '50 руб/час',
    detail: '*мин. время – 3 часа',
    src: 'src/assets/images/clock-money.svg'
  },
  {
    price: '1,3 руб/км',
    detail: '*за пределами МКАД',
    src: 'src/assets/images/km-money.svg'
  }
]
</script>

<template>
  <div id="prices" :class="$style.prices">
    <div :class="$style.container">
      <div :class="$style.title">
        <VTypography color="cultured" size="s50" weight="medium">ТАРИФЫ</VTypography>
        <VUnderline :centering="'left'" />
      </div>

      <div :class="$style.info">
        <div :class="$style.tariffs">
          <div v-for="tariff of tariffs" :key="tariff" :class="$style.tariff">
            <img :src="tariff.src" alt="price" />
            <div :class="$style.tariffInfo">
              <VTypography color="cultured" size="xxl">{{ tariff.price }}</VTypography>
              <VTypography color="cultured" size="l">{{ tariff.detail }}</VTypography>
            </div>
          </div>
        </div>
        <div :class="$style.details">
          <VTypography color="orange">*</VTypography>
          <VTypography color="cultured">
            Данные тарифы относятся только к услуге “Гидроборт”. Стоимость услуги “Грузоперевозки
            Минск-Москва” уточняйте по <u @click="scrollTo('contacts')">телефону</u>.
          </VTypography>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

.prices {
  background-color: $color-wet-asphalt;
  padding-bottom: 80px;
  padding-top: 80px;

  .container {
    display: grid;
    grid-template-columns: 35% 65%;

    .title {
      width: max-content;
    }

    .info {
      display: grid;
      gap: 50px;

      .tariffs {
        display: grid;
        grid-template-columns: repeat(2, max-content);
        justify-content: space-between;

        .tariff {
          display: flex;
          gap: 30px;

          .tariffInfo {
            display: flex;
            gap: 10px;
            justify-content: end;
            flex-direction: column;
          }
        }
      }
      .details {
        display: flex;

        u {
          color: $color-orange;
        }
      }
    }
  }
}
</style>
