import * as telegramApi from 'telegram-api-vue/dist/telegramApi.min';

telegramApi.setConfig({
  app: {
    id: 12549930, /* App ID */
    hash: 'b65c98897e49bd4783873a906abbdd5d', /* App hash */
    version: '1.0.0' /* App version */
  },
  server: {
    test: [
      {
        id: 2, /* DC ID */
        host: '149.154.167.40',
        port: 443
      }
    ],
    production: [
      {
        id: 2, /* DC ID */
        host: '149.154.167.50',
        port: 443
      }
    ]
  }
});

export default telegramApi;