<script setup>
import VTypography from '@/components/Common/VTypography.vue'
import VUnderline from '@/components/Common/VUnderline.vue'

import ServiceCard from '@/components/Services/ServiceCard.vue'
import GidrobortPrice from '@/components/Services/ServicePrice/Gidrobort.vue'
import CountriesPrice from '@/components/Services/ServicePrice/Countries.vue'

import gidrobortImage from '../../assets/images/gidrobort.jpg'
import gruzpoerevozkiImage from '../../assets/images/gruzoperevozki.jpeg'

const services = [
  {
    title: 'Гидроборт',
    description: `Гидроборт обеспечивает безопасную и быструю погрузку и разгрузку грузов различной тяжести.`,
    imageSrc: gidrobortImage,
    priceComponent: GidrobortPrice
  },
  {
    title: `Грузоперевозки <br/> Беларусь - Россия`,
    description: `Мы предоставляем надежные и своевременные грузоперевозки по маршруту Минск-Москва.`,
    imageSrc: gruzpoerevozkiImage,
    priceComponent: CountriesPrice
  }
]
</script>

<template>
  <div id="services" :class="$style.servicesBox">
    <div :class="$style.container">
      <div :class="$style.titleBox">
        <div :class="$style.title">
          <VTypography weight="medium">УСЛУГИ</VTypography>
          <VUnderline :centering="'left'" />
        </div>

        <VTypography :class="$style.description">
          Мы предоставляем профессиональное обслуживание и поддержку по транспортировке вашего груза
          по всей территории Беларуси и России.
        </VTypography>
      </div>

      <div :class="$style.services">
        <ServiceCard v-for="service of services" :key="service.title" :title="service.title">
          <template #price><component :is="service.priceComponent" /></template>
          <template #description>{{ service.description }}</template>
          <template #image>
            <img :src="service.imageSrc" :alt="title" />
          </template>
        </ServiceCard>
      </div>
    </div>
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

.servicesBox {
  padding-bottom: 80px;
  padding-top: 80px;

  .container {
    display: grid;
    grid-template-columns: 35% 65%;

    .titleBox {
      margin-bottom: 40px;

      .title {
        width: max-content;

        p {
          font-size: 50px;
        }
      }

      .description {
        line-height: 22px;
        margin-top: 30px;
        margin-right: 20px;
      }
    }

    .services {
      display: flex;
      gap: 60px;
    }
  }
}

@media screen and (max-width: 1220px) {
  .servicesBox .container .services {
    gap: 30px;
    justify-content: space-evenly;
  }
}

@media screen and (max-width: 1100px) {
  .servicesBox .container .titleBox .description {
    margin-top: 15px;
  }
}

@media screen and (max-width: 980px) {
  .servicesBox {
    padding-bottom: 50px;
    padding-top: 50px;

    .container {
      grid-template-columns: none;
      .titleBox {
        display: flex;
        gap: 20%;
        margin-bottom: 30px;

        .title p {
          font-size: 40px;
        }

        .description {
          margin-right: 0px;
          margin-top: 0px;
        }
      }
    }
  }
}

@media screen and (max-width: $tablet-point) {
  .servicesBox {
    padding-bottom: 30px;
    padding-top: 30px;

    .container .titleBox {
      gap: 10px;
      flex-direction: column;
      margin-bottom: 20px;
    }
  }
}

@media screen and (max-width: 600px) {
  .servicesBox {
    .container .titleBox {
      .title {
        p {
          font-size: 30px;
        }
      }

      .description {
        font-size: 14px;
        line-height: 1.5;
        max-width: 500px;
      }
    }
  }
}

@media screen and (max-width: 530px) {
  .servicesBox .container {
    .services {
      align-items: center;
      flex-direction: column;
    }
  }
}
</style>
