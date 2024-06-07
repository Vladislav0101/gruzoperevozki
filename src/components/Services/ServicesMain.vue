<script setup>
import ServiceCard from '@/components/Services/ServiceCard.vue'
import VTypography from '@/components/Common/VTypography.vue'

const services = [
  {
    title: 'Гидроборт',
    description: `Использование гидроборта предоставляет
       эффективное и безопасное решение для транспортировки вашего груза. 
       Гидроборт — это гидравлическая платформа, установленная на задней части грузового 
       автомобиля, которая позволяет легко загружать и выгружать тяжелые или громоздкие грузы.`,
    imageSrc: '/src/assets/images/gidrobort.jpg',
    price: 'от 50 р/ч'
  },
  {
    title: 'Грузоперевозки Минск - Москва',
    description: `Предлагаем надежные грузоперевозки Минск-Москва. 
    Быстрая доставка, выгодные тарифы, полный спектр логистических услуг. 
    Обеспечим сохранность вашего груза и доставим его точно в срок!`,
    imageSrc: '/src/assets/images/gruzoperevozki.jpeg',
    price: 'уточняйте у оператора'
  }
]
</script>

<template>
  <div id="services" :class="$style.servicesBox">
    <div :class="$style.container">
      <div :class="$style.titleBox">
        <VTypography size="xxl" weight="bold"> Услуги </VTypography>
      </div>

      <div :class="$style.services">
        <ServiceCard v-for="service of services" :key="service.title">
          <template #title>{{ service.title }}</template>
          <template #price>{{ service.price }}</template>
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
  background-color: $color-cultured;
  padding-top: 50px;
  padding-bottom: 50px;

  .titleBox {
    margin-bottom: 40px;
  }

  .services {
    display: grid;
    gap: 60px;
    grid-template-columns: 1fr 1fr;
    justify-items: center;
  }
}
</style>
