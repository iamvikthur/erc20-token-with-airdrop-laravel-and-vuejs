const path = require("path");
require("dotenv").config({path: './.env'})
const HDWalletProvider = require("@truffle/hdwallet-provider");
const AccountIndex = 0;

module.exports = {
  contracts_build_directory: path.join(__dirname, "client/src/contracts"),
  plugins: [
    'truffle-plugin-verify'
  ],
  api_keys: {
    bscscan: "MS1P67SGGQPX2ISWVXK1P9VKV5EEV1TNA4"
  },
  networks: {
    development: {
      port: 7545,
      host: '127.0.0.1',
      network_id: 5777
    },
    ganache_cli: {
      provider: function(){
        return new HDWalletProvider(process.env.MNEMONIC, "http://127.0.0.1:7545", AccountIndex);
      },
      network_id: 5777
    },
    gorli_network: {
      provider: function(){
        return new HDWalletProvider(process.env.MNEMONIC, "https://goerli.infura.io/v3/8fa36a685e88497d93ae5945a92051ad", AccountIndex);
      },
      network_id: 5
    },
    ropsten_network: {
      provider: function(){
        return new HDWalletProvider(process.env.MNEMONIC, "https://ropsten.infura.io/v3/8fa36a685e88497d93ae5945a92051ad", AccountIndex);
      },
      network_id: 3
    },
    bsc_testnet: {
      provider: function(){
        return new HDWalletProvider(process.env.MNEMONIC, "https://data-seed-prebsc-1-s1.binance.org:8545", AccountIndex);
      },
      network_id: 97
    },
    bsc_mainnet: {
      provider: function(){
        return new HDWalletProvider(process.env.MNEMONIC, "https://bsc-dataseed.binance.org/", AccountIndex);
      },
      network_id: 56
    }
  },
  compilers: {
    solc: {
      version: '^0.8'
    }
  }
};
