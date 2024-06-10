<script setup>
import VTypography from '@/components/Common/VTypography.vue'
import VUnderline from '@/components/Common/VUnderline.vue'
import AdvantageCard from '@/components/Advantages/AdvantageCard.vue'

const advantagesDict = [
  {
    number: '01.',
    title: 'Репутация.',
    description: 'Более сотни положительных отзывов от наших довольных клиентов.'
  },
  {
    number: '02.',
    title: 'Профессионализм.',
    description: 'Мы обеспечим надежный процесс грузоперевозки под ключ.'
  },
  {
    number: '03.',
    title: 'Ответственность.',
    description:
      'Мы бережно относимся к каждому грузу и гарантируем его безопасную доставку в срок.'
  }
]
</script>

<template>
  <div id="advantages" :class="[$style.container, $style.advantages]">
    <div :class="$style.title">
      <VTypography size="s50" weight="medium">ПОЧЕМУ МЫ?</VTypography>
      <VUnderline />
    </div>

    <div :class="$style.cardsBox">
      <AdvantageCard v-for="advantage of advantagesDict" :key="advantage.number">
        <template #number>{{ advantage.number }}</template>
        <template #title>{{ advantage.title }}</template>
        <template #description>{{ advantage.description }}</template>
      </AdvantageCard>
    </div>
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

.advantages {
  padding: 100px 40px;

  .title {
    margin: auto;
    width: max-content;
  }

  .cardsBox {
    display: grid;
    gap: 50px;
    grid-template-columns: repeat(3, 1fr);
    margin-top: 80px;
  }
}
</style>
