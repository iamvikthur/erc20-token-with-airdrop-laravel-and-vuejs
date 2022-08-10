const NGLTOKEN = artifacts.require("NGL");
const NGLSALE = artifacts.require("NGLSALE");
const NGLADDRLOCK = artifacts.require("NGLADDRESSLOCK")
require('dotenv').config({path: '../.env'});
const web3 = require('web3');


module.exports = async function (deployer) {
  const initialSupply = web3.utils.toBN(process.env.INITIAL_TOKENS_SUPPLY);

  const tokensToSell = initialSupply.divn(2)
  
  await deployer.deploy(NGLADDRLOCK)
  await deployer.deploy(NGLTOKEN, initialSupply, NGLADDRLOCK.address);
  await deployer.deploy(NGLSALE, 100, process.env.CROWD_SALE_ADDRESS, NGLTOKEN.address, NGLADDRLOCK.address);

  const instance = await NGLTOKEN.deployed();
  await instance.transfer(NGLSALE.address, tokensToSell)
};
