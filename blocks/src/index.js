const { registerPaymentMethod } = window.wc.wcBlocksRegistry;
const { __ } = wp.i18n;

const defaultLabel = __('Pay with Bitcoin with LNbits', 'lnbits');

const LNbitsComponent = () => {
    return (
        <div className="lnbits-block-payment">
            <p>{__('You can use any Bitcoin wallet to pay. Powered by LNbits.', 'lnbits')}</p>
        </div>
    );
};

const LNbitsPaymentMethod = {
    name: 'lnbits',
    label: defaultLabel,
    content: <LNbitsComponent />,
    edit: <LNbitsComponent />,
    canMakePayment: () => true,
    ariaLabel: defaultLabel,
    supports: {
        features: ['products'],
    },
};

registerPaymentMethod(LNbitsPaymentMethod); 