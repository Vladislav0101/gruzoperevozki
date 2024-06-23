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
      <VTypography weight="medium">ПОЧЕМУ МЫ?</VTypography>
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
  padding: 80px 40px;

  .title {
    margin: auto;
    width: max-content;

    p {
      font-size: 50px;
    }
  }

  .cardsBox {
    display: grid;
    gap: 50px;
    grid-template-columns: repeat(3, 1fr);
    margin-top: 80px;
  }
}

@media screen and (max-width: $desktop-point) {
  .advantages {
    padding: 50px 20px;

    .cardsBox {
      gap: 30px;
      margin-top: 50px;
    }
  }
}

@media screen and (max-width: 980px) {
  .advantages {
    .title p {
      font-size: 40px;
    }

    .cardsBox {
      gap: 20px;
      grid-template-columns: repeat(4, 1fr);
      margin-top: 40px;

      div:nth-child(1) {
        grid-area: 1/1/2/3;
      }

      div:nth-child(2) {
        grid-area: 1/3/2/5;
      }

      div:nth-child(3) {
        grid-area: 2/2/3/4;
      }
    }
  }
}

@media screen and (max-width: $tablet-point) {
  .advantages {
    padding-bottom: 30px;
    padding-top: 30px;
  }
}

@media screen and (max-width: 600px) {
  .advantages {
    .title p {
      font-size: 30px;
    }
  }
}

@media screen and (max-width: 480px) {
  .advantages .cardsBox {
    margin-top: 30px;

    div:nth-child(1) {
        grid-area: 1/1/2/5;
      }

      div:nth-child(2) {
        grid-area: 2/1/3/5;
      }

      div:nth-child(3) {
        grid-area: 3/1/4/5;
      }
  }
}
</style>
