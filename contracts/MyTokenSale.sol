// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

import "./Crowdsale.sol";
import "./NGLADDRLOCK.sol";

contract NGLSALE is Crowdsale {

    NGLADDRESSLOCK nglLock;

    constructor(
        uint256 rate,    /* rate in TKNbits */ 
        address payable wallet, 
        IERC20 token,
        NGLADDRESSLOCK _nglLock
        ) 
        Crowdsale(rate, wallet, token)
    {
        nglLock = _nglLock;
    }

    function _updateAddressStatus(address beneficiary) internal override returns(bool) {
        

        nglLock.lockAddress(msg.sender);

        super._updateAddressStatus(beneficiary);

        return true;
    }
}