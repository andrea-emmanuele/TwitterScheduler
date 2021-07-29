# TwitterScheduler
<a href="https://github.com/andrea-emmanuele/TwitterScheduler/blob/master/LICENSE">
    <img src="https://img.shields.io/github/license/tailwindcomponents/dashboard-template">
</a>
<br />
<br />

Live [Demo](https://twitterscheduler.andreaemmanuele.it)

## Framework utilizzati

- [Vue 3](https://v3.vuejs.org/) (javascript)
- [Laravel 8](https://laravel.com/) (php)
- [Tailwind](https://tailwindcss.com/) (css)

## Altro

- [Vuex](https://vuex.vuejs.org/) (State Management)
- [Amazon S3](https://aws.amazon.com/it/s3/) (File Storage)

## Installazione


## Funzionalità

- **Pubblicare un tweet** 
  <br/><br/>
  <img src="https://img.shields.io/github/license/tailwindcomponents/dashboard-template">
  <br/><br/>
- **Programmare la pubblicazione di un tweet**
  <br/><br/>
  <img src="https://twitterscheduler.s3.eu-central-1.amazonaws.com/functionalities/CPT2107291823-685x431.gif?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEIb%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDGV1LWNlbnRyYWwtMSJHMEUCIGK%2FPgyraEvTLUBSMAD0eiKDOpVG61%2FiLWTaTf3XA37rAiEAyWjOONHeuA9gYYm7CxHQiRt0dKxcHPInhUv2J4iG9vMq%2FwIIj%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FARAAGgwzNDM5MjM1MjMwNTEiDIFAnbQnvvKsJfC6ECrTAiRAK6NKM5EWuEnXtbQZNsZxXEnyFRuehMUeCVqZb6vmxwHJkGwtGj93hoPK%2BMXhBCwRc2KsOBbJRep4oBwnpXxH7jrrL3ZkDUOH7LVRvcFzi9%2BwUY105fbMpqhRR8aqQwoFAbD8kKmlx%2Bb3tFm9xZ%2FrMMRyju3Z8RygLNd77rZi87UJ3tx0zunTYNZFqekXI1cNxsU1Fap3Hvw%2BAnzqM6qvHCmm%2BJ6QPm%2F51LO0i48a5GTGY0Lzli2irA8qO32dXLTTsqefPgABJSdWcsynBNaXXBkhDgAXNUVbQh7NNQat2WrF9vKAXB3FbdC4rNamPdkd7njV1ZrX47ylKY8nYGOgzA5uWVsmHtUuUiX9DQPsziB%2FriV1L11TpvrdVfESGSPzMnx1e%2BfrOjNOMC0pkVnMZ6xsmZpJLcpG79eKWWu2Ap%2BbYP4QLTE8SPExMHsRuePLQTCL8IqIBjqzAp%2Botfk1AJ4sCenRu8IKHOtXnfpdA%2B8g2ter6M%2BUu0DdpDnlItKJN7H2jrdcvDLkvgIvPaMEYIGLAnGwOJKzSfZWjoEN%2BILp8P41DhLpmSeXY789spko5u62%2FOjzibw1edksEQv99vHVXDCxOM1EkqZlvu6IO9cgiqWtoyIWFrH3SxhkSDaebKPMCn5TG5dbzJngr4ZZJ4QP%2F2M26njNkRItOCngylBdSPm51O5Iqy%2F9qk%2BYnjTo56%2BYsd8tVN2PUdh%2FDwJyz7XXC%2FhBSKV1ie6bk%2FB%2BN%2BA0KolXt5YY7omtOW3oWbcNu4W1CXZApdiFhzAbEvcsSRstVfHnvKjizZzP5Qr7c5SDzCyEQGWEa0HBYU0r8TitL9TxQ1AgWnrczlLmGlBrKhdFdWLUB9zlFobpXMo%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20210729T163043Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAVAE3QPXV6YNPSGL2%2F20210729%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Signature=b3147a65ec20c288d9e8cab7b1bd2e33528ec09a4adc388ae82c9926c58a62bc">
  <br/><br/>
- **Visualizzazione dei tweets programmati**
  <br/><br/>
  <img src="https://twitterscheduler.s3.eu-central-1.amazonaws.com/functionalities/CPT2107291823-682x596.gif?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEIb%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDGV1LWNlbnRyYWwtMSJHMEUCIGK%2FPgyraEvTLUBSMAD0eiKDOpVG61%2FiLWTaTf3XA37rAiEAyWjOONHeuA9gYYm7CxHQiRt0dKxcHPInhUv2J4iG9vMq%2FwIIj%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FARAAGgwzNDM5MjM1MjMwNTEiDIFAnbQnvvKsJfC6ECrTAiRAK6NKM5EWuEnXtbQZNsZxXEnyFRuehMUeCVqZb6vmxwHJkGwtGj93hoPK%2BMXhBCwRc2KsOBbJRep4oBwnpXxH7jrrL3ZkDUOH7LVRvcFzi9%2BwUY105fbMpqhRR8aqQwoFAbD8kKmlx%2Bb3tFm9xZ%2FrMMRyju3Z8RygLNd77rZi87UJ3tx0zunTYNZFqekXI1cNxsU1Fap3Hvw%2BAnzqM6qvHCmm%2BJ6QPm%2F51LO0i48a5GTGY0Lzli2irA8qO32dXLTTsqefPgABJSdWcsynBNaXXBkhDgAXNUVbQh7NNQat2WrF9vKAXB3FbdC4rNamPdkd7njV1ZrX47ylKY8nYGOgzA5uWVsmHtUuUiX9DQPsziB%2FriV1L11TpvrdVfESGSPzMnx1e%2BfrOjNOMC0pkVnMZ6xsmZpJLcpG79eKWWu2Ap%2BbYP4QLTE8SPExMHsRuePLQTCL8IqIBjqzAp%2Botfk1AJ4sCenRu8IKHOtXnfpdA%2B8g2ter6M%2BUu0DdpDnlItKJN7H2jrdcvDLkvgIvPaMEYIGLAnGwOJKzSfZWjoEN%2BILp8P41DhLpmSeXY789spko5u62%2FOjzibw1edksEQv99vHVXDCxOM1EkqZlvu6IO9cgiqWtoyIWFrH3SxhkSDaebKPMCn5TG5dbzJngr4ZZJ4QP%2F2M26njNkRItOCngylBdSPm51O5Iqy%2F9qk%2BYnjTo56%2BYsd8tVN2PUdh%2FDwJyz7XXC%2FhBSKV1ie6bk%2FB%2BN%2BA0KolXt5YY7omtOW3oWbcNu4W1CXZApdiFhzAbEvcsSRstVfHnvKjizZzP5Qr7c5SDzCyEQGWEa0HBYU0r8TitL9TxQ1AgWnrczlLmGlBrKhdFdWLUB9zlFobpXMo%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20210729T163013Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAVAE3QPXV6YNPSGL2%2F20210729%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Signature=48ab5192b4a5c56a3536ce4fa0f7b110930a8c15f0d8a1128871f223272e6818">
  <br/><br/>
- **Line breaks**
  <br/><br/>
  <img src="https://twitterscheduler.s3.eu-central-1.amazonaws.com/functionalities/CPT2107291833-703x370.gif?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEIb%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDGV1LWNlbnRyYWwtMSJHMEUCIGK%2FPgyraEvTLUBSMAD0eiKDOpVG61%2FiLWTaTf3XA37rAiEAyWjOONHeuA9gYYm7CxHQiRt0dKxcHPInhUv2J4iG9vMq%2FwIIj%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FARAAGgwzNDM5MjM1MjMwNTEiDIFAnbQnvvKsJfC6ECrTAiRAK6NKM5EWuEnXtbQZNsZxXEnyFRuehMUeCVqZb6vmxwHJkGwtGj93hoPK%2BMXhBCwRc2KsOBbJRep4oBwnpXxH7jrrL3ZkDUOH7LVRvcFzi9%2BwUY105fbMpqhRR8aqQwoFAbD8kKmlx%2Bb3tFm9xZ%2FrMMRyju3Z8RygLNd77rZi87UJ3tx0zunTYNZFqekXI1cNxsU1Fap3Hvw%2BAnzqM6qvHCmm%2BJ6QPm%2F51LO0i48a5GTGY0Lzli2irA8qO32dXLTTsqefPgABJSdWcsynBNaXXBkhDgAXNUVbQh7NNQat2WrF9vKAXB3FbdC4rNamPdkd7njV1ZrX47ylKY8nYGOgzA5uWVsmHtUuUiX9DQPsziB%2FriV1L11TpvrdVfESGSPzMnx1e%2BfrOjNOMC0pkVnMZ6xsmZpJLcpG79eKWWu2Ap%2BbYP4QLTE8SPExMHsRuePLQTCL8IqIBjqzAp%2Botfk1AJ4sCenRu8IKHOtXnfpdA%2B8g2ter6M%2BUu0DdpDnlItKJN7H2jrdcvDLkvgIvPaMEYIGLAnGwOJKzSfZWjoEN%2BILp8P41DhLpmSeXY789spko5u62%2FOjzibw1edksEQv99vHVXDCxOM1EkqZlvu6IO9cgiqWtoyIWFrH3SxhkSDaebKPMCn5TG5dbzJngr4ZZJ4QP%2F2M26njNkRItOCngylBdSPm51O5Iqy%2F9qk%2BYnjTo56%2BYsd8tVN2PUdh%2FDwJyz7XXC%2FhBSKV1ie6bk%2FB%2BN%2BA0KolXt5YY7omtOW3oWbcNu4W1CXZApdiFhzAbEvcsSRstVfHnvKjizZzP5Qr7c5SDzCyEQGWEa0HBYU0r8TitL9TxQ1AgWnrczlLmGlBrKhdFdWLUB9zlFobpXMo%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20210729T163546Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAVAE3QPXV6YNPSGL2%2F20210729%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Signature=9b6c1c85d59db49c851ea9aa832b8fe231734335ebc94d17f566485f5698f8cf">
  <br/><br/>
- **Link**
  <br/><br/>
  <img src="https://twitterscheduler.s3.eu-central-1.amazonaws.com/functionalities/CPT2107291835-695x380.gif?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEIb%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDGV1LWNlbnRyYWwtMSJHMEUCIGK%2FPgyraEvTLUBSMAD0eiKDOpVG61%2FiLWTaTf3XA37rAiEAyWjOONHeuA9gYYm7CxHQiRt0dKxcHPInhUv2J4iG9vMq%2FwIIj%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FARAAGgwzNDM5MjM1MjMwNTEiDIFAnbQnvvKsJfC6ECrTAiRAK6NKM5EWuEnXtbQZNsZxXEnyFRuehMUeCVqZb6vmxwHJkGwtGj93hoPK%2BMXhBCwRc2KsOBbJRep4oBwnpXxH7jrrL3ZkDUOH7LVRvcFzi9%2BwUY105fbMpqhRR8aqQwoFAbD8kKmlx%2Bb3tFm9xZ%2FrMMRyju3Z8RygLNd77rZi87UJ3tx0zunTYNZFqekXI1cNxsU1Fap3Hvw%2BAnzqM6qvHCmm%2BJ6QPm%2F51LO0i48a5GTGY0Lzli2irA8qO32dXLTTsqefPgABJSdWcsynBNaXXBkhDgAXNUVbQh7NNQat2WrF9vKAXB3FbdC4rNamPdkd7njV1ZrX47ylKY8nYGOgzA5uWVsmHtUuUiX9DQPsziB%2FriV1L11TpvrdVfESGSPzMnx1e%2BfrOjNOMC0pkVnMZ6xsmZpJLcpG79eKWWu2Ap%2BbYP4QLTE8SPExMHsRuePLQTCL8IqIBjqzAp%2Botfk1AJ4sCenRu8IKHOtXnfpdA%2B8g2ter6M%2BUu0DdpDnlItKJN7H2jrdcvDLkvgIvPaMEYIGLAnGwOJKzSfZWjoEN%2BILp8P41DhLpmSeXY789spko5u62%2FOjzibw1edksEQv99vHVXDCxOM1EkqZlvu6IO9cgiqWtoyIWFrH3SxhkSDaebKPMCn5TG5dbzJngr4ZZJ4QP%2F2M26njNkRItOCngylBdSPm51O5Iqy%2F9qk%2BYnjTo56%2BYsd8tVN2PUdh%2FDwJyz7XXC%2FhBSKV1ie6bk%2FB%2BN%2BA0KolXt5YY7omtOW3oWbcNu4W1CXZApdiFhzAbEvcsSRstVfHnvKjizZzP5Qr7c5SDzCyEQGWEa0HBYU0r8TitL9TxQ1AgWnrczlLmGlBrKhdFdWLUB9zlFobpXMo%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20210729T163648Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAVAE3QPXV6YNPSGL2%2F20210729%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Signature=491c8cca2113afc636c6c9e10beabf349052e2850c6075e9104f596e51915f9c">
  <br/><br/>
- **Hashtags**
  <br/><br/>
  <img src="https://twitterscheduler.s3.eu-central-1.amazonaws.com/functionalities/CPT2107291839-695x320.gif?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEIb%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDGV1LWNlbnRyYWwtMSJHMEUCIGK%2FPgyraEvTLUBSMAD0eiKDOpVG61%2FiLWTaTf3XA37rAiEAyWjOONHeuA9gYYm7CxHQiRt0dKxcHPInhUv2J4iG9vMq%2FwIIj%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FARAAGgwzNDM5MjM1MjMwNTEiDIFAnbQnvvKsJfC6ECrTAiRAK6NKM5EWuEnXtbQZNsZxXEnyFRuehMUeCVqZb6vmxwHJkGwtGj93hoPK%2BMXhBCwRc2KsOBbJRep4oBwnpXxH7jrrL3ZkDUOH7LVRvcFzi9%2BwUY105fbMpqhRR8aqQwoFAbD8kKmlx%2Bb3tFm9xZ%2FrMMRyju3Z8RygLNd77rZi87UJ3tx0zunTYNZFqekXI1cNxsU1Fap3Hvw%2BAnzqM6qvHCmm%2BJ6QPm%2F51LO0i48a5GTGY0Lzli2irA8qO32dXLTTsqefPgABJSdWcsynBNaXXBkhDgAXNUVbQh7NNQat2WrF9vKAXB3FbdC4rNamPdkd7njV1ZrX47ylKY8nYGOgzA5uWVsmHtUuUiX9DQPsziB%2FriV1L11TpvrdVfESGSPzMnx1e%2BfrOjNOMC0pkVnMZ6xsmZpJLcpG79eKWWu2Ap%2BbYP4QLTE8SPExMHsRuePLQTCL8IqIBjqzAp%2Botfk1AJ4sCenRu8IKHOtXnfpdA%2B8g2ter6M%2BUu0DdpDnlItKJN7H2jrdcvDLkvgIvPaMEYIGLAnGwOJKzSfZWjoEN%2BILp8P41DhLpmSeXY789spko5u62%2FOjzibw1edksEQv99vHVXDCxOM1EkqZlvu6IO9cgiqWtoyIWFrH3SxhkSDaebKPMCn5TG5dbzJngr4ZZJ4QP%2F2M26njNkRItOCngylBdSPm51O5Iqy%2F9qk%2BYnjTo56%2BYsd8tVN2PUdh%2FDwJyz7XXC%2FhBSKV1ie6bk%2FB%2BN%2BA0KolXt5YY7omtOW3oWbcNu4W1CXZApdiFhzAbEvcsSRstVfHnvKjizZzP5Qr7c5SDzCyEQGWEa0HBYU0r8TitL9TxQ1AgWnrczlLmGlBrKhdFdWLUB9zlFobpXMo%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20210729T164050Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAVAE3QPXV6YNPSGL2%2F20210729%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Signature=645bf20411c55481de9b7168e817dfbd99f31408f616da8adcfeb5f4babee7c5">
  <br/><br/>
- **Menzioni**
  <br/><br/>
  <img src="https://twitterscheduler.s3.eu-central-1.amazonaws.com/functionalities/CPT2107291839-695x326.gif?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEIb%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDGV1LWNlbnRyYWwtMSJHMEUCIGK%2FPgyraEvTLUBSMAD0eiKDOpVG61%2FiLWTaTf3XA37rAiEAyWjOONHeuA9gYYm7CxHQiRt0dKxcHPInhUv2J4iG9vMq%2FwIIj%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FARAAGgwzNDM5MjM1MjMwNTEiDIFAnbQnvvKsJfC6ECrTAiRAK6NKM5EWuEnXtbQZNsZxXEnyFRuehMUeCVqZb6vmxwHJkGwtGj93hoPK%2BMXhBCwRc2KsOBbJRep4oBwnpXxH7jrrL3ZkDUOH7LVRvcFzi9%2BwUY105fbMpqhRR8aqQwoFAbD8kKmlx%2Bb3tFm9xZ%2FrMMRyju3Z8RygLNd77rZi87UJ3tx0zunTYNZFqekXI1cNxsU1Fap3Hvw%2BAnzqM6qvHCmm%2BJ6QPm%2F51LO0i48a5GTGY0Lzli2irA8qO32dXLTTsqefPgABJSdWcsynBNaXXBkhDgAXNUVbQh7NNQat2WrF9vKAXB3FbdC4rNamPdkd7njV1ZrX47ylKY8nYGOgzA5uWVsmHtUuUiX9DQPsziB%2FriV1L11TpvrdVfESGSPzMnx1e%2BfrOjNOMC0pkVnMZ6xsmZpJLcpG79eKWWu2Ap%2BbYP4QLTE8SPExMHsRuePLQTCL8IqIBjqzAp%2Botfk1AJ4sCenRu8IKHOtXnfpdA%2B8g2ter6M%2BUu0DdpDnlItKJN7H2jrdcvDLkvgIvPaMEYIGLAnGwOJKzSfZWjoEN%2BILp8P41DhLpmSeXY789spko5u62%2FOjzibw1edksEQv99vHVXDCxOM1EkqZlvu6IO9cgiqWtoyIWFrH3SxhkSDaebKPMCn5TG5dbzJngr4ZZJ4QP%2F2M26njNkRItOCngylBdSPm51O5Iqy%2F9qk%2BYnjTo56%2BYsd8tVN2PUdh%2FDwJyz7XXC%2FhBSKV1ie6bk%2FB%2BN%2BA0KolXt5YY7omtOW3oWbcNu4W1CXZApdiFhzAbEvcsSRstVfHnvKjizZzP5Qr7c5SDzCyEQGWEa0HBYU0r8TitL9TxQ1AgWnrczlLmGlBrKhdFdWLUB9zlFobpXMo%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20210729T164119Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAVAE3QPXV6YNPSGL2%2F20210729%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Signature=d5b1f3f3352c39f42f0bde6e7a0b9d98e6a854dfd0ee0d69cf2c4dd92306b499">
  <br/><br/>
- **Integrare un'immagine al tweet**
  <br/><br/>
  <img src="https://twitterscheduler.s3.eu-central-1.amazonaws.com/functionalities/CPT2107291844-729x838.gif?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEIb%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDGV1LWNlbnRyYWwtMSJHMEUCIGK%2FPgyraEvTLUBSMAD0eiKDOpVG61%2FiLWTaTf3XA37rAiEAyWjOONHeuA9gYYm7CxHQiRt0dKxcHPInhUv2J4iG9vMq%2FwIIj%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FARAAGgwzNDM5MjM1MjMwNTEiDIFAnbQnvvKsJfC6ECrTAiRAK6NKM5EWuEnXtbQZNsZxXEnyFRuehMUeCVqZb6vmxwHJkGwtGj93hoPK%2BMXhBCwRc2KsOBbJRep4oBwnpXxH7jrrL3ZkDUOH7LVRvcFzi9%2BwUY105fbMpqhRR8aqQwoFAbD8kKmlx%2Bb3tFm9xZ%2FrMMRyju3Z8RygLNd77rZi87UJ3tx0zunTYNZFqekXI1cNxsU1Fap3Hvw%2BAnzqM6qvHCmm%2BJ6QPm%2F51LO0i48a5GTGY0Lzli2irA8qO32dXLTTsqefPgABJSdWcsynBNaXXBkhDgAXNUVbQh7NNQat2WrF9vKAXB3FbdC4rNamPdkd7njV1ZrX47ylKY8nYGOgzA5uWVsmHtUuUiX9DQPsziB%2FriV1L11TpvrdVfESGSPzMnx1e%2BfrOjNOMC0pkVnMZ6xsmZpJLcpG79eKWWu2Ap%2BbYP4QLTE8SPExMHsRuePLQTCL8IqIBjqzAp%2Botfk1AJ4sCenRu8IKHOtXnfpdA%2B8g2ter6M%2BUu0DdpDnlItKJN7H2jrdcvDLkvgIvPaMEYIGLAnGwOJKzSfZWjoEN%2BILp8P41DhLpmSeXY789spko5u62%2FOjzibw1edksEQv99vHVXDCxOM1EkqZlvu6IO9cgiqWtoyIWFrH3SxhkSDaebKPMCn5TG5dbzJngr4ZZJ4QP%2F2M26njNkRItOCngylBdSPm51O5Iqy%2F9qk%2BYnjTo56%2BYsd8tVN2PUdh%2FDwJyz7XXC%2FhBSKV1ie6bk%2FB%2BN%2BA0KolXt5YY7omtOW3oWbcNu4W1CXZApdiFhzAbEvcsSRstVfHnvKjizZzP5Qr7c5SDzCyEQGWEa0HBYU0r8TitL9TxQ1AgWnrczlLmGlBrKhdFdWLUB9zlFobpXMo%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20210729T164557Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAVAE3QPXV6YNPSGL2%2F20210729%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Signature=2b88da9db8bf797c9d29b4dc6530044ddce496b17d6f6ac8629434fc9f4f048e">
  <br/><br/>
- **Gestione degli eventi**
  <br/><br/>
  <img src="">
  <br/><br/>
- **Aggiornamento della lista dei tweets e del tempo trascorso dalla data di pubblicazione**
<br/><br/>
  <img src="">
  <br/><br/>


