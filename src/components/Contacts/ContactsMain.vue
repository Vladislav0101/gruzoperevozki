<script setup>
import VTypography from '@/components/Common/VTypography.vue'
import VUnderline from '@/components/Common/VUnderline.vue'
import Form from '@/components/Contacts/Form.vue'
</script>

<template>
  <div id="contacts" :class="$style.contactsBox">
    <div :class="$style.container">
      <div :class="$style.title">
        <VTypography size="s50" weight="medium">ОСТАЛИСЬ ВОПРОСЫ?</VTypography>
        <VUnderline />
        <VTypography :class="$style.callUs" size="s40" weight="extraLight" color="orange">
          СВЯЖИТЕСЬ С НАМИ
        </VTypography>
      </div>

      <div :class="$style.formBox">
        <Form />

        <div :class="$style.contacts">
          <div :class="$style.contact">
            <div :class="$style.contactImageBox">
              <img src="../../assets/icons/phone.svg" alt="phone" />
            </div>
            <a href="tel:+375447768306">
              <VTypography size="xl">+375 (44) 776-83-06</VTypography>
            </a>
          </div>

          <div :class="$style.contact">
            <div :class="$style.contactImageBox">
              <img src="../../assets/icons/mail.svg" alt="mail" />
            </div>
            <a href="mailto:transports-logistics@mail.ru">
              <VTypography size="xl">transports-logistics@mail.ru</VTypography>
            </a>
          </div>

          <div :class="$style.contact">
            <div :class="$style.contactImageBox">
              <img src="../../assets/icons/instagram.svg" alt="instagram" />
            </div>
            <a href="mailto:transports-logistics@mail.ru">
              <VTypography size="xl">
                <a
                  href="https://www.instagram.com/transports.logistics?igsh=ZWRpejJ4NXd6ZDZx"
                  target="_blank"
                >
                  transports.logistics
                </a>
              </VTypography>
            </a>
          </div>
        </div>
      </div>
    </div>

    <img :class="$style.car" src="../../assets/images/car.svg" alt="delivery" />
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

.contactsBox {
  position: relative;

  .container {
    padding-top: 80px;
    padding-bottom: 80px;

    .title {
      margin: 0 auto 60px;
      text-align: center;
      width: max-content;

      .callUs {
        margin-top: 15px;
      }
    }

    .formBox {
      display: grid;
      grid-template-columns: 50% 35%;
      justify-content: space-between;
      gap: 30px;

      .contacts {
        display: flex;
        gap: 30px;
        flex-direction: column;

        .contact {
          align-items: center;
          display: flex;
          gap: 15px;

          .contactImageBox {
            align-items: center;
            border-radius: 100%;
            display: flex;
            justify-content: center;
            background-color: $color-wet-asphalt;
            height: 40px;
            width: 40px;

            img {
              width: 62.5%;
            }
          }

          a:hover {
            text-decoration: underline;
          }
        }
      }
    }
  }

  .car {
    bottom: 0;
    position: absolute;
    right: 0;
    width: 40%;
    z-index: -1;
  }
}

@media screen and (max-width: $desktop-point) {
  .contactsBox .container {
    padding-bottom: 50px;
    padding-top: 50px;

    .title {
      margin-bottom: 40px;

      .callUs {
        margin-top: 5px;
      }
    }

    .formBox {
      grid-template-columns: 50% 45%;

      .contacts {
        gap: 20px;

        .contact {
          gap: 10px;

          .contactImageBox {
            height: 30px;
            width: 30px;
          }
        }
      }
    }
  }
}

@media screen and (max-width: 980px) {
  .contactsBox .container {
    .title {
      .callUs {
        font-size: 30px;
      }

      p:nth-child(1) {
        font-size: 40px;
      }
    }

    .formBox {
      .contactImageBox {
        height: 25px;
        width: 25px;
      }

      p {
        font-size: 20px;
      }
    }
  }
}

@media screen and (max-width: $tablet-point) {
  .contactsBox .container {
    .formBox {
      grid-template-columns: 43% 48%;

      p {
        font-size: 18px;
      }

      .contacts .contact .contactImageBox {
        height: 25px;
        width: 25px;
      }
    }

    .title {
      margin-bottom: 30px;
    }
  }
}

@media screen and (max-width: 600px) {
  .contactsBox .container {
    padding-bottom: 70px;
    padding-top: 30px;

    .formBox {
      display: flex;
      flex-direction: column-reverse;
    }

    .title {
      .callUs {
        font-size: 24px;
      }

      p:nth-child(1) {
        font-size: 30px;
      }
    }
  }
}

@media screen and (max-width: 440px) {
  .contactsBox .container .title {
    .callUs {
      font-size: 22px;
    }

    p:nth-child(1) {
      font-size: 26px;
    }
  }
}
</style>
