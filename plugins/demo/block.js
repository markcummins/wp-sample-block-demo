(function (blocks, element, data, blockEditor) {
  var el = element.createElement,
    registerBlockType = blocks.registerBlockType,
    useBlockProps = blockEditor.useBlockProps;

  registerBlockType('cp-keynotes/header', {
    apiVersion: 3,
    title: 'Keynotes - Header',
    icon: 'block-default',
    category: 'cp-keynotes',
    edit: function () {
      var blockProps = useBlockProps();

      return el('div', blockProps,
        el('div', {
          style: {
            display: 'flex',
            paddingLeft: '2rem',
            paddingRight: '2rem',
            height: '180px',
            color: '#fff',
            alignItems: 'center',
            backgroundColor: '#278dff',
          }
        },
          [
            el('div', {}, [
              el('h4', { style: { margin: '12px' } }, `Lorem ipsum dolor sit amet...`),
              el('p', { style: { margin: '12px' } }, `Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia...`),
            ])
          ]
        )
      );
    },
  });
})(
  window.wp.blocks,
  window.wp.element,
  window.wp.data,
  window.wp.blockEditor
);