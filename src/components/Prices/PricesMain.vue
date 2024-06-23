<script setup>
import scrollTo from '@/utils/scrollTo.js'

import VTypography from '@/components/Common/VTypography.vue'
import VUnderline from '@/components/Common/VUnderline.vue'

import ClockMoney from '../../assets/icons/clock-money.svg'
import KmMoney from '../../assets/icons/km-money.svg'

const tariffs = [
  {
    price: '50 руб/час',
    detail: '*мин. время – 3 часа',
    src: ClockMoney
  },
  {
    price: '1,3 руб/км',
    detail: '*за пределами МКАД',
    src: KmMoney
  }
]
</script>

<template>
  <div id="prices" :class="$style.prices">
    <div :class="$style.container">
      <div :class="$style.title">
        <VTypography color="cultured" weight="medium">ТАРИФЫ</VTypography>
        <VUnderline :centering="'left'" />
      </div>

      <div :class="$style.info">
        <div :class="$style.tariffs">
          <div v-for="tariff of tariffs" :key="tariff" :class="$style.tariff">
            <img :src="tariff.src" alt="price" />
            <div :class="$style.tariffInfo">
              <VTypography color="cultured">{{ tariff.price }}</VTypography>
              <VTypography color="cultured">{{ tariff.detail }}</VTypography>
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

      p {
        font-size: 50px;
      }
    }

    .info {
      display: grid;
      gap: 50px;

      .tariffs {
        align-items: center;
        display: flex;
        gap: 30px;
        justify-content: space-between;

        .tariff {
          display: flex;
          gap: 15px;

          img {
            width: 30%;
          }

          .tariffInfo {
            display: flex;
            gap: 10px;
            justify-content: end;
            flex-direction: column;

            p:nth-child(1) {
              font-size: 32px;
            }

            p:nth-child(2) {
              font-size: 20px;
            }
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

@media screen and (max-width: 1200px) {
  .prices {
    padding-bottom: 60px;
    padding-top: 60px;
  }
}

@media screen and (max-width: 1160px) {
  .prices .container .info .details p:nth-child(2) {
    font-size: 14px;
  }
}

@media screen and (max-width: 1150px) {
  .prices .container .info {
    gap: 25px;

    .tariffs .tariff {
      .tariffInfo {
        p:nth-child(1) {
          font-size: 28px;
        }

        p:nth-child(2) {
          font-size: 16px;
        }
      }

      img {
        width: 25%;
      }
    }
  }
}

@media screen and (max-width: 980px) {
  .prices.container.title p {
    font-size: 40px;
  }
}

@media screen and (max-width: 890px) {
  .prices .container {
    .title p {
      font-size: 40px;
    }

    .info .tariffs {
      gap: 15px;

      .tariff {
        .tariffInfo {
          gap: 5px;

          p:nth-child(1) {
            font-size: 24px;
          }

          p:nth-child(2) {
            font-size: 14px;
          }
        }
      }
    }
  }
}

@media screen and (max-width: $tablet-point) {
  .prices {
    padding-bottom: 30px;
    padding-top: 30px;

    .container {
      display: flex;
      gap: 30px;
      flex-direction: column;

      .info {
        .tariffs .tariff {
          img {
            width: 20%;
          }

          .tariffInfo {
            p:nth-child(1) {
              font-size: 20px;
            }

            p:nth-child(2) {
              font-size: 14px;
            }
          }
        }

        .details p:nth-child(2) {
          font-size: 12px;
        }
      }
    }
  }
}

@media screen and (max-width: 600px) {
  .prices .container .title p {
    font-size: 30px;
  }
}

@media screen and (max-width: 500px) {
  .prices .container .info .tariffs .tariff .tariffInfo p:nth-child(2) {
    font-size: 12px;
  }
}
</style>
