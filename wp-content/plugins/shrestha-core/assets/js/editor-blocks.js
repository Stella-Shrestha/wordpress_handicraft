/**
 * Shrestha Handicraft Gutenberg Blocks Definition
 * Card & Accordion Visual Block Canvas Interface
 */
(function (blocks, element, components, i18n) {
  const el = element.createElement;
  const { useState } = element;
  const { registerBlockType } = blocks;
  const { TextControl, TextareaControl, RangeControl, SelectControl } = components;
  const { __ } = i18n;

  // Resilient Select component fallback
  const SafeSelectControl = SelectControl || function (props) {
    return el('div', { className: 'components-base-control' },
      props.label ? el('label', { className: 'components-base-control__label' }, props.label) : null,
      el('select', {
        value: props.value,
        className: 'components-select-control__input',
        style: { width: '100%', padding: '6px 8px', borderRadius: '4px', border: '1px solid #ccc' },
        onChange: (e) => props.onChange && props.onChange(e.target.value)
      },
        (props.options || []).map((opt, idx) => el('option', { key: idx, value: opt.value }, opt.label))
      )
    );
  };

  /**
   * Generic Reusable Accordion Card Component for Gutenberg Blocks
   */
  function AccordionCard(props) {
    const { icon, title, subtitle, rows } = props;
    const [openStates, setOpenStates] = useState(
      rows.reduce((acc, _, idx) => ({ ...acc, [idx]: idx === 0 }), {})
    );
    const [allExpanded, setAllExpanded] = useState(false);

    const toggleRow = (idx) => {
      setOpenStates(prev => ({ ...prev, [idx]: !prev[idx] }));
    };

    const toggleAll = (e) => {
      e.preventDefault();
      const next = !allExpanded;
      setAllExpanded(next);
      setOpenStates(
        rows.reduce((acc, _, idx) => ({ ...acc, [idx]: next }), {})
      );
    };

    return el('div', { className: 'shrestha-block-card-container' },
      // Card Header
      el('div', { className: 'shrestha-block-card-header' },
        el('div', { className: 'shrestha-block-title-group' },
          el('span', { className: 'shrestha-block-icon' }, icon),
          el('div', {},
            el('h3', { className: 'shrestha-block-card-title' }, title),
            el('p', { className: 'shrestha-block-card-subtitle' }, subtitle)
          )
        ),
        el('button', {
          type: 'button',
          className: 'shrestha-block-expand-btn',
          onClick: toggleAll
        }, allExpanded ? __('Collapse All', 'shrestha-core') : __('Expand All', 'shrestha-core'))
      ),

      // Accordion Rows
      el('div', { className: 'shrestha-block-accordion-list' },
        rows.map((row, idx) => {
          const isOpen = !!openStates[idx];
          return el('div', {
            key: idx,
            className: `shrestha-block-accordion-row ${isOpen ? 'is-open' : ''}`
          },
            el('div', {
              className: 'shrestha-block-accordion-head',
              onClick: () => toggleRow(idx)
            },
              el('span', { className: 'shrestha-block-accordion-title' }, row.title),
              el('svg', {
                className: 'shrestha-block-chevron',
                viewBox: '0 0 24 24',
                fill: 'none',
                stroke: 'currentColor',
                strokeWidth: '2'
              },
                el('polyline', { points: '6 9 12 15 18 9' })
              )
            ),
            isOpen && el('div', { className: 'shrestha-block-accordion-body' }, row.content)
          );
        })
      )
    );
  }

  /**
   * Reusable WordPress Media Library Picker Component
   */
  function ShresthaMediaPicker(props) {
    const { label, imageUrl, imageAsset, onSelect, onRemove } = props;
    
    const blockEditor = window.wp.blockEditor || window.wp.editor || {};
    const MediaUpload = blockEditor.MediaUpload;
    const MediaUploadCheck = blockEditor.MediaUploadCheck;

    // Determine current preview image src
    let currentPreview = '';
    if (imageUrl) {
      currentPreview = imageUrl;
    } else if (imageAsset) {
      const themeUrl = (window.shresthaCoreData && window.shresthaCoreData.themeUrl) ? window.shresthaCoreData.themeUrl : '';
      currentPreview = themeUrl ? (themeUrl + '/assets/' + imageAsset) : imageAsset;
    }

    const openNativeMediaModal = () => {
      if (typeof window.wp !== 'undefined' && window.wp.media) {
        const frame = window.wp.media({
          title: __('Select or Upload Specimen Image', 'shrestha-core'),
          button: { text: __('Use this image', 'shrestha-core') },
          multiple: false,
          library: { type: 'image' }
        });
        frame.on('select', function () {
          const attachment = frame.state().get('selection').first().toJSON();
          if (attachment && attachment.url) {
            onSelect(attachment);
          }
        });
        frame.open();
      }
    };

    const renderPickerContent = (openModal) => {
      const triggerOpen = openModal || openNativeMediaModal;

      return el('div', { className: 'shrestha-media-picker-box' },
        el('div', { className: 'shrestha-media-preview-container' },
          currentPreview ? el('div', { className: 'shrestha-media-thumb-wrapper' },
            el('img', {
              src: currentPreview,
              alt: 'Specimen Preview',
              className: 'shrestha-media-thumb-img'
            }),
            el('div', { className: 'shrestha-media-status-badge' },
              imageUrl ? __('Custom Media Library Image Active', 'shrestha-core') : __('Default Theme Asset Active (' + (imageAsset || 'green_tara.jpg') + ')', 'shrestha-core')
            )
          ) : el('div', { className: 'shrestha-media-placeholder' },
            el('span', { style: { fontSize: '28px' } }, '🖼️'),
            el('p', { style: { margin: '6px 0 0 0', fontSize: '12px', color: '#64748b' } }, __('No image selected', 'shrestha-core'))
          )
        ),
        el('div', { className: 'shrestha-media-actions' },
          el('button', {
            type: 'button',
            className: 'button button-primary shrestha-media-select-btn',
            onClick: triggerOpen
          },
            el('span', { style: { marginRight: '6px' } }, '📁'),
            imageUrl ? __('Replace from Media Library', 'shrestha-core') : __('Open Media Library to Choose / Upload Image', 'shrestha-core')
          ),
          imageUrl ? el('button', {
            type: 'button',
            className: 'button button-secondary shrestha-media-remove-btn',
            onClick: onRemove
          }, __('Reset to Default Asset', 'shrestha-core')) : null
        )
      );
    };

    if (MediaUpload && MediaUploadCheck) {
      return el('div', { className: 'components-base-control' },
        el('label', { className: 'components-base-control__label' }, label || __('Story Photo Card Image', 'shrestha-core')),
        el(MediaUploadCheck, {},
          el(MediaUpload, {
            onSelect: (media) => onSelect(media),
            allowedTypes: ['image'],
            value: imageUrl,
            render: ({ open }) => renderPickerContent(open)
          })
        )
      );
    }

    return el('div', { className: 'components-base-control' },
      el('label', { className: 'components-base-control__label' }, label || __('Story Photo Card Image', 'shrestha-core')),
      renderPickerContent(null)
    );
  }

  /**
   * Classic WYSIWYG Text Editor Component
   * Guaranteed visible editing canvas + TinyMCE formatting toolbar + caret-safe typing
   */
  function ShresthaClassicEditor(props) {
    const { label, value, onChange } = props;
    const [mode, setMode] = useState('visual'); // 'visual' | 'text'
    const editorRef = element.useRef(null);
    const lastValueRef = element.useRef(value || '');

    // Synchronize content on mode switch or initial mount
    element.useEffect(() => {
      if (mode === 'visual' && editorRef.current) {
        if (editorRef.current.innerHTML !== (value || '')) {
          editorRef.current.innerHTML = value || '';
          lastValueRef.current = value || '';
        }
      }
    }, [mode]);

    const handleInput = () => {
      if (editorRef.current) {
        const html = editorRef.current.innerHTML;
        lastValueRef.current = html;
        onChange(html);
      }
    };

    const execCmd = (cmd, arg = null) => {
      if (mode !== 'visual' || !editorRef.current) return;
      editorRef.current.focus();

      if (cmd === 'createLink') {
        const url = window.prompt(__('Enter URL link (e.g. https://...):', 'shrestha-core'));
        if (url) {
          document.execCommand('createLink', false, url);
        }
      } else {
        document.execCommand(cmd, false, arg);
      }
      handleInput();
    };

    return el('div', { className: 'shrestha-classic-editor-container' },
      el('div', { className: 'shrestha-classic-editor-top' },
        el('label', { className: 'components-base-control__label' }, label || __('Narrative Body Story Text', 'shrestha-core')),
        el('div', { className: 'shrestha-editor-tabs' },
          el('button', {
            type: 'button',
            className: `shrestha-editor-tab ${mode === 'visual' ? 'is-active' : ''}`,
            onClick: () => setMode('visual')
          }, __('Visual', 'shrestha-core')),
          el('button', {
            type: 'button',
            className: `shrestha-editor-tab ${mode === 'text' ? 'is-active' : ''}`,
            onClick: () => setMode('text')
          }, __('Text', 'shrestha-core'))
        )
      ),
      mode === 'visual' ? el('div', { className: 'shrestha-classic-visual-wrap' },
        // Classic WYSIWYG Toolbar
        el('div', { className: 'shrestha-classic-toolbar' },
          el('button', { type: 'button', className: 'shrestha-tb-btn', title: 'Bold (Ctrl+B)', onMouseDown: (e) => { e.preventDefault(); execCmd('bold'); } }, el('strong', {}, 'B')),
          el('button', { type: 'button', className: 'shrestha-tb-btn', title: 'Italic (Ctrl+I)', onMouseDown: (e) => { e.preventDefault(); execCmd('italic'); } }, el('em', {}, 'I')),
          el('button', { type: 'button', className: 'shrestha-tb-btn', title: 'Underline (Ctrl+U)', onMouseDown: (e) => { e.preventDefault(); execCmd('underline'); } }, el('u', {}, 'U')),
          el('span', { className: 'shrestha-tb-sep' }),
          el('button', { type: 'button', className: 'shrestha-tb-btn', title: 'Bullet List', onMouseDown: (e) => { e.preventDefault(); execCmd('insertUnorderedList'); } }, '• List'),
          el('button', { type: 'button', className: 'shrestha-tb-btn', title: 'Numbered List', onMouseDown: (e) => { e.preventDefault(); execCmd('insertOrderedList'); } }, '1. List'),
          el('button', { type: 'button', className: 'shrestha-tb-btn', title: 'Blockquote', onMouseDown: (e) => { e.preventDefault(); execCmd('formatBlock', 'blockquote'); } }, '❝ Quote'),
          el('span', { className: 'shrestha-tb-sep' }),
          el('button', { type: 'button', className: 'shrestha-tb-btn', title: 'Insert Link', onMouseDown: (e) => { e.preventDefault(); execCmd('createLink'); } }, '🔗 Link'),
          el('button', { type: 'button', className: 'shrestha-tb-btn', title: 'Remove Link', onMouseDown: (e) => { e.preventDefault(); execCmd('unlink'); } }, '⮾ Unlink'),
          el('span', { className: 'shrestha-tb-sep' }),
          el('button', { type: 'button', className: 'shrestha-tb-btn', title: 'Clear Formatting', onMouseDown: (e) => { e.preventDefault(); execCmd('removeFormat'); } }, '🧹 Clear')
        ),
        // ContentEditable Canvas with explicit visible styling
        el('div', {
          ref: editorRef,
          className: 'shrestha-classic-canvas',
          contentEditable: true,
          suppressContentEditableWarning: true,
          onInput: handleInput,
          onBlur: handleInput,
          style: {
            minHeight: '140px',
            maxHeight: '380px',
            overflowY: 'auto',
            padding: '14px 16px',
            fontSize: '13.5px',
            lineHeight: '1.65',
            color: '#1e293b',
            background: '#ffffff',
            outline: 'none',
            display: 'block',
            cursor: 'text',
            boxSizing: 'border-box'
          }
        })
      ) : el('div', { className: 'shrestha-classic-text-wrap' },
        el(TextareaControl, {
          value: value,
          rows: 6,
          className: 'shrestha-raw-html-area',
          onChange: (val) => onChange(val)
        })
      )
    );
  }

  /* =========================================================================
     1. HERO SPECIMEN SPOTLIGHT BLOCK
     ========================================================================= */
  registerBlockType('shrestha/hero-specimen', {
    title: __('Hero Specimen Spotlight', 'shrestha-core'),
    description: __('Hero banner featuring a consecrated sacred specimen with technical crosshairs HUD.', 'shrestha-core'),
    icon: 'flame',
    category: 'shrestha-blocks',
    attributes: {
      badgeText: { type: 'string', default: 'SPECIMEN #SH-001' },
      consecratedText: { type: 'string', default: 'RITUAL CONSECRATED' },
      titleHighlight: { type: 'string', default: 'Green Tara' },
      titleSubtitle: { type: 'string', default: 'Mother of Divine Liberation' },
      description: { type: 'string', default: 'Hand-cast using lost-wax iconometry (Cire Perdue) from 8-metal Ashtadhatu alloy. Adorned with 24K gold-leaf fire gilding and cold-chiseled facial symmetry, crafted according to 14th-century Sanskrit treatise canons in Patan, Nepal.' },
      specimenSku: { type: 'string', default: 'SH-001' },
      primaryBtnText: { type: 'string', default: 'Add to Cart' },
      secondaryBtnText: { type: 'string', default: 'Inspect Technical Spec' },
      symmetryText: { type: 'string', default: 'ICONOMETRIC SYMMETRY: 99.8%' },
      imageAsset: { type: 'string', default: 'green_tara.jpg' },
      imageUrl: { type: 'string', default: '' },
      imageId: { type: 'number', default: 0 },
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;

      return el(AccordionCard, {
        icon: '📖',
        title: __('About: Our Story & Hero Section', 'shrestha-core'),
        subtitle: __('Shrestha Handicraft Atelier • Hero Banner & Specimen Spotlight', 'shrestha-core'),
        rows: [
          {
            title: __('1. Header Titles & Badges', 'shrestha-core'),
            content: el('div', {},
              el('div', { className: 'shrestha-block-field-grid' },
                el(TextControl, {
                  label: __('Pill Tag / SKU Badge', 'shrestha-core'),
                  value: attributes.badgeText,
                  onChange: val => setAttributes({ badgeText: val })
                }),
                el(TextControl, {
                  label: __('Consecration Status Tag', 'shrestha-core'),
                  value: attributes.consecratedText,
                  onChange: val => setAttributes({ consecratedText: val })
                })
              ),
              el('div', { className: 'shrestha-block-field-grid', style: { marginTop: '12px' } },
                el(TextControl, {
                  label: __('Gold Highlight Title', 'shrestha-core'),
                  value: attributes.titleHighlight,
                  onChange: val => setAttributes({ titleHighlight: val })
                }),
                el(TextControl, {
                  label: __('Headline Subtitle', 'shrestha-core'),
                  value: attributes.titleSubtitle,
                  onChange: val => setAttributes({ titleSubtitle: val })
                })
              )
            )
          },
          {
            title: __('2. Story Photo Card Image', 'shrestha-core'),
            content: el('div', {},
              el(ShresthaMediaPicker, {
                label: __('Specimen Spotlight Image (Media Library)', 'shrestha-core'),
                imageUrl: attributes.imageUrl,
                imageAsset: attributes.imageAsset,
                onSelect: (media) => {
                  setAttributes({
                    imageUrl: media.url,
                    imageId: media.id || 0
                  });
                },
                onRemove: () => {
                  setAttributes({
                    imageUrl: '',
                    imageId: 0
                  });
                }
              }),
              el('div', { style: { marginTop: '12px', borderTop: '1px dashed #e2e8f0', paddingTop: '10px' } },
                el(TextControl, {
                  label: __('Optional Direct Image URL / Custom CDN Link', 'shrestha-core'),
                  value: attributes.imageUrl,
                  placeholder: 'https://...',
                  onChange: val => setAttributes({ imageUrl: val })
                }),
                el(TextControl, {
                  label: __('Fallback Theme Asset Filename', 'shrestha-core'),
                  value: attributes.imageAsset,
                  help: __('e.g. green_tara.jpg, shakyamuni.jpg, mahakala.jpg', 'shrestha-core'),
                  onChange: val => setAttributes({ imageAsset: val })
                })
              )
            )
          },
          {
            title: __('3. Story Narrative Text & Content (Call-To-Action Buttons)', 'shrestha-core'),
            content: el('div', {},
              el(ShresthaClassicEditor, {
                label: __('Narrative Body Story Text (Classic WYSIWYG Editor)', 'shrestha-core'),
                value: attributes.description,
                onChange: val => setAttributes({ description: val })
              }),
              el('div', { className: 'shrestha-block-field-grid', style: { marginTop: '16px' } },
                el(TextControl, {
                  label: __('Target Specimen SKU', 'shrestha-core'),
                  value: attributes.specimenSku,
                  onChange: val => setAttributes({ specimenSku: val })
                }),
                el(TextControl, {
                  label: __('Primary Button Text', 'shrestha-core'),
                  value: attributes.primaryBtnText,
                  onChange: val => setAttributes({ primaryBtnText: val })
                }),
                el(TextControl, {
                  label: __('Secondary Button Text', 'shrestha-core'),
                  value: attributes.secondaryBtnText,
                  onChange: val => setAttributes({ secondaryBtnText: val })
                })
              )
            )
          },
          {
            title: __('4. Safety & Technical Proportions Guarantee Box', 'shrestha-core'),
            content: el('div', {},
              el(TextControl, {
                label: __('HUD Crosshair Symmetry Label', 'shrestha-core'),
                value: attributes.symmetryText,
                onChange: val => setAttributes({ symmetryText: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     2. INFINITE METALLURGY TICKER BLOCK
     ========================================================================= */
  registerBlockType('shrestha/infinite-ticker', {
    title: __('Infinite Metallurgy Ticker', 'shrestha-core'),
    description: __('Continuous animated banner displaying metallurgical canons and guild credentials.', 'shrestha-core'),
    icon: 'ellipsis',
    category: 'shrestha-blocks',
    attributes: {
      items: {
        type: 'array',
        default: [
          { icon: 'award', text: 'PATAN MASTER SCULPTORS GUILD' },
          { icon: 'shield-check', text: '99.9% ASHTADHATU ASSAY CERTIFIED' },
          { icon: 'landmark', text: 'SACRED ART INSTITUTE OF KYOTO' },
          { icon: 'scroll-text', text: 'SANSKRIT SHILPA SHASTRA CANON' },
          { icon: 'flame', text: 'LICCHAVI LOST-WAX CIRE PERDUE' },
          { icon: 'badge-check', text: 'MONASTIC CONSECRATION SEALED' }
        ]
      },
      item1: { type: 'string', default: '' },
      item2: { type: 'string', default: '' },
      item3: { type: 'string', default: '' },
      item4: { type: 'string', default: '' },
      item5: { type: 'string', default: '' },
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;

      const defaultItems = [
        { icon: 'award', text: 'PATAN MASTER SCULPTORS GUILD' },
        { icon: 'shield-check', text: '99.9% ASHTADHATU ASSAY CERTIFIED' },
        { icon: 'landmark', text: 'SACRED ART INSTITUTE OF KYOTO' },
        { icon: 'scroll-text', text: 'SANSKRIT SHILPA SHASTRA CANON' },
        { icon: 'flame', text: 'LICCHAVI LOST-WAX CIRE PERDUE' },
        { icon: 'badge-check', text: 'MONASTIC CONSECRATION SEALED' }
      ];

      // Parse & migrate items safely
      let currentItems = Array.isArray(attributes.items) ? attributes.items : [];
      if (currentItems.length === 0) {
        const legacyItems = [];
        if (attributes.item1) legacyItems.push({ icon: 'award', text: attributes.item1 });
        if (attributes.item2) legacyItems.push({ icon: 'shield-check', text: attributes.item2 });
        if (attributes.item3) legacyItems.push({ icon: 'landmark', text: attributes.item3 });
        if (attributes.item4) legacyItems.push({ icon: 'scroll-text', text: attributes.item4 });
        if (attributes.item5) legacyItems.push({ icon: 'badge-check', text: attributes.item5 });

        currentItems = legacyItems.length > 0 ? legacyItems : defaultItems;
      }

      // Guarantee each item is a valid object
      currentItems = currentItems.map(item => {
        if (!item || typeof item !== 'object') {
          return { icon: 'award', text: typeof item === 'string' ? item : '' };
        }
        return {
          icon: typeof item.icon === 'string' && item.icon ? item.icon : 'award',
          text: typeof item.text === 'string' ? item.text : ''
        };
      });

      // Trigger Lucide icons rendering if loaded
      element.useEffect(() => {
        if (window.lucide && typeof window.lucide.createIcons === 'function') {
          try {
            window.lucide.createIcons();
          } catch (e) {}
        }
      }, [currentItems]);

      const updateItem = (index, key, val) => {
        const nextItems = [...currentItems];
        nextItems[index] = { ...nextItems[index], [key]: val };
        setAttributes({ items: nextItems });
      };

      const addItem = () => {
        const nextItems = [
          ...currentItems,
          { icon: 'sparkles', text: 'NEW SACRED CERTIFICATION / CANON' }
        ];
        setAttributes({ items: nextItems });
      };

      const removeItem = (index) => {
        if (currentItems.length <= 1) {
          alert(__('At least one ticker point is required.', 'shrestha-core'));
          return;
        }
        const nextItems = currentItems.filter((_, idx) => idx !== index);
        setAttributes({ items: nextItems });
      };

      const moveItem = (index, direction) => {
        const nextIndex = index + direction;
        if (nextIndex < 0 || nextIndex >= currentItems.length) return;
        const nextItems = [...currentItems];
        const temp = nextItems[index];
        nextItems[index] = nextItems[nextIndex];
        nextItems[nextIndex] = temp;
        setAttributes({ items: nextItems });
      };

      return el(AccordionCard, {
        icon: '🎗',
        title: __('Front Page: Infinite Metallurgy Ticker Banner', 'shrestha-core'),
        subtitle: __('Continuous animated marquee of atelier certifications & canons', 'shrestha-core'),
        rows: [
          {
            title: __('1. Ticker Items & Guild Canons (' + currentItems.length + ' Active Points)', 'shrestha-core'),
            content: el('div', { className: 'shrestha-ticker-list-wrapper' },
              currentItems.map((item, idx) => {
                const iconSlug = item.icon || 'award';
                return el('div', { key: idx, className: 'shrestha-ticker-item-card' },
                  el('div', { className: 'shrestha-ticker-item-header' },
                    el('div', { className: 'shrestha-ticker-badge-group' },
                      el('span', { className: 'shrestha-ticker-item-num' }, __('Point #' + (idx + 1), 'shrestha-core')),
                      el('span', { className: 'shrestha-ticker-icon-preview-tag' },
                        el('i', { 'data-lucide': iconSlug, className: 'shrestha-lucide-inline-icon', style: { display: 'inline-block', width: '14px', height: '14px', verticalAlign: 'middle', marginRight: '4px' } }),
                        el('code', {}, iconSlug)
                      )
                    ),
                    el('div', { className: 'shrestha-ticker-item-actions' },
                      idx > 0 ? el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn',
                        title: 'Move Up',
                        onClick: () => moveItem(idx, -1)
                      }, '↑') : null,
                      idx < currentItems.length - 1 ? el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn',
                        title: 'Move Down',
                        onClick: () => moveItem(idx, 1)
                      }, '↓') : null,
                      el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn shrestha-ticker-remove-btn',
                        title: 'Remove Point',
                        onClick: () => removeItem(idx)
                      }, '🗑️ ' + __('Remove', 'shrestha-core'))
                    )
                  ),
                  el('div', { className: 'shrestha-ticker-grid' },
                    // Left Column: Manual Lucide Icon Input + Docs Link
                    el('div', { className: 'shrestha-ticker-icon-col' },
                      el(TextControl, {
                        label: __('Lucide Icon Name / Slug', 'shrestha-core'),
                        value: item.icon || '',
                        placeholder: 'e.g. award, flame, shield-check...',
                        help: el('span', { style: { fontSize: '11px', display: 'block', marginTop: '3px' } },
                          __('Type any Lucide icon name. Browse all icons at ', 'shrestha-core'),
                          el('a', {
                            href: 'https://lucide.dev/icons',
                            target: '_blank',
                            rel: 'noopener noreferrer',
                            style: { color: '#d49b4b', fontWeight: 600, textDecoration: 'underline' }
                          }, 'lucide.dev/icons ↗')
                        ),
                        onChange: (val) => {
                          const cleanSlug = (val || '').toLowerCase().trim().replace(/[\s_]+/g, '-').replace(/[^a-z0-9-]/g, '');
                          updateItem(idx, 'icon', cleanSlug);
                        }
                      })
                    ),
                    // Right Column: Ticker Text Input
                    el('div', { className: 'shrestha-ticker-text-col' },
                      el(TextControl, {
                        label: __('Ticker Text', 'shrestha-core'),
                        value: item.text || '',
                        placeholder: __('e.g. PATAN MASTER SCULPTORS GUILD', 'shrestha-core'),
                        onChange: (val) => updateItem(idx, 'text', val)
                      })
                    )
                  )
                );
              }),
              el('div', { style: { display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginTop: '10px' } },
                el('button', {
                  type: 'button',
                  className: 'button button-primary shrestha-ticker-add-btn',
                  onClick: addItem
                }, '➕ ' + __('Add New Ticker Point', 'shrestha-core')),
                el('span', { style: { fontSize: '11.5px', color: '#64748b' } },
                  __('Items loop continuously on the front page banner.', 'shrestha-core')
                )
              )
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     3. CONSECRATED SPECIMENS GRID BLOCK
     ========================================================================= */
  const defaultSpecimenCards = [
    {
      title: 'Green Tara Specimen',
      sku: 'SH-001',
      price: '14,800',
      badge: 'ASHTADHATU',
      grade: 'SPECIMEN GRADE',
      flames: 3,
      alloy: 'Ashtadhatu (8-Metal)',
      height: '22.5 in (57.1 cm) (124 Angulas)',
      weight: '14.2 kg',
      imageAsset: 'green_tara.jpg',
      imageUrl: '',
      linkUrl: ''
    },
    {
      title: 'Mahakala 6-Armed',
      sku: 'SH-108',
      price: '19,500',
      badge: '24K GOLD LEAF',
      grade: 'SPECIMEN GRADE',
      flames: 3,
      alloy: 'Ashtadhatu (8-Metal)',
      height: '18.0 in (45.7 cm) (108 Angulas)',
      weight: '18.6 kg',
      imageAsset: 'mahakala.jpg',
      imageUrl: '',
      linkUrl: ''
    },
    {
      title: 'Shakyamuni Buddha',
      sku: 'SH-042',
      price: '12,400',
      badge: 'CIRE PERDUE',
      grade: 'SPECIMEN GRADE',
      flames: 3,
      alloy: 'Sacred Copper & Gold',
      height: '20.0 in (50.8 cm) (120 Angulas)',
      weight: '11.8 kg',
      imageAsset: 'shakyamuni.jpg',
      imageUrl: '',
      linkUrl: ''
    }
  ];

  registerBlockType('shrestha/newly-consecrated', {
    title: __('Newly Consecrated Specimens', 'shrestha-core'),
    description: __('Display deity statues with custom alloy badges, technical specs, photos, and instant cart triggers.', 'shrestha-core'),
    icon: 'grid-view',
    category: 'shrestha-blocks',
    attributes: {
      title: { type: 'string', default: 'Newly Consecrated' },
      subtitle: { type: 'string', default: 'A rotating selection of recently completed pieces, cast this season in our Patan workshops.' },
      source: { type: 'string', default: 'manual' },
      selectedIds: { type: 'array', default: [20, 22, 21] },
      numberOfPosts: { type: 'number', default: 3 },
      catalogLink: { type: 'string', default: '' },
      catalogText: { type: 'string', default: 'VIEW ALL PACKAGES & CATALOG' }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;

      const source = attributes.source || 'manual';
      const selectedIds = Array.isArray(attributes.selectedIds) ? attributes.selectedIds.map(Number) : [20, 22, 21];
      const numberOfPosts = typeof attributes.numberOfPosts === 'number' ? attributes.numberOfPosts : 3;

      const rawPosts = (window.shresthaCoreData && Array.isArray(window.shresthaCoreData.availablePosts) && window.shresthaCoreData.availablePosts.length > 0)
        ? window.shresthaCoreData.availablePosts
        : [
            { id: 20, title: 'Green Tara: Mother of Divine Liberation', subtitle: '22.5 in (57.1 cm) | 14.2 kg | NRP 14,800 | Consecrated', sku: 'SH-001' },
            { id: 21, title: 'Shakyamuni Buddha: Earth-Touching Mudra', subtitle: '24.0 in (61.0 cm) | 16.5 kg | NRP 16,500 | Consecrated', sku: 'SH-002' },
            { id: 22, title: 'Mahakala: Wrathful Guardian of Sacred Dharma', subtitle: '18.0 in (45.7 cm) | 18.6 kg | NRP 19,500 | Consecrated', sku: 'SH-108' }
          ];

      // Map posts by ID for quick lookup
      const postMap = {};
      rawPosts.forEach(p => {
        postMap[Number(p.id)] = p;
      });

      // Filter available list: items not currently in selectedIds
      const availableList = rawPosts.filter(p => !selectedIds.includes(Number(p.id)));

      // Selected list: mapped objects in exact order of selectedIds
      const selectedList = selectedIds.map(id => {
        return postMap[Number(id)] || {
          id: id,
          title: 'Statue #' + id,
          subtitle: 'Consecrated Specimen #' + id
        };
      });

      const addToSelected = (postId) => {
        const idNum = Number(postId);
        if (!selectedIds.includes(idNum)) {
          setAttributes({ selectedIds: [...selectedIds, idNum] });
        }
      };

      const removeFromSelected = (index) => {
        const updated = selectedIds.filter((_, idx) => idx !== index);
        setAttributes({ selectedIds: updated });
      };

      const moveUp = (index) => {
        if (index <= 0) return;
        const updated = [...selectedIds];
        const temp = updated[index];
        updated[index] = updated[index - 1];
        updated[index - 1] = temp;
        setAttributes({ selectedIds: updated });
      };

      const moveDown = (index) => {
        if (index >= selectedIds.length - 1) return;
        const updated = [...selectedIds];
        const temp = updated[index];
        updated[index] = updated[index + 1];
        updated[index + 1] = temp;
        setAttributes({ selectedIds: updated });
      };

      const handleSliderChange = (val) => {
        const num = parseInt(val, 10);
        if (!isNaN(num) && num >= 1) {
          setAttributes({ numberOfPosts: num });
        }
      };

      return el(AccordionCard, {
        icon: '💎',
        title: __('Front Page: Consecrated Specimens Showcase', 'shrestha-core'),
        subtitle: __('Newly consecrated deity statues query & dual-list card selector', 'shrestha-core'),
        rows: [
          {
            title: __('1. Section Header & Kicker', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Section Headline Title', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Subtitle / Description', 'shrestha-core'),
                value: attributes.subtitle,
                onChange: val => setAttributes({ subtitle: val })
              }),
              el(TextControl, {
                label: __('Explore Catalog Button Text', 'shrestha-core'),
                value: attributes.catalogText,
                onChange: val => setAttributes({ catalogText: val })
              }),
              el(TextControl, {
                label: __('Custom Catalog URL (Optional)', 'shrestha-core'),
                value: attributes.catalogLink,
                placeholder: '/catalog/',
                onChange: val => setAttributes({ catalogLink: val })
              })
            )
          },
          {
            title: __('2. Statue Selection & Display Query', 'shrestha-core'),
            content: el('div', { className: 'shrestha-showcase-transfer-wrapper' },
              // SOURCE Dropdown
              el('div', { className: 'shrestha-source-control-wrap' },
                el('label', { className: 'shrestha-field-label-bold' }, __('SOURCE', 'shrestha-core')),
                el('select', {
                  className: 'shrestha-source-select',
                  value: source,
                  onChange: (e) => setAttributes({ source: e.target.value })
                },
                  el('option', { value: 'manual' }, __('Choose Statues Manually', 'shrestha-core')),
                  el('option', { value: 'dynamic' }, __('Latest Consecrated Statues (Automatic)', 'shrestha-core'))
                )
              ),

              // Dual-List Box if manual
              source === 'manual' ? el('div', { className: 'shrestha-dual-list-container' },
                // Left Column: Available Statues
                el('div', { className: 'shrestha-dual-list-box' },
                  el('div', { className: 'shrestha-dual-list-header' }, __('Available Statues', 'shrestha-core')),
                  el('div', { className: 'shrestha-dual-list-items' },
                    availableList.length === 0
                      ? el('div', { className: 'shrestha-dual-list-empty' }, __('All statues are selected', 'shrestha-core'))
                      : availableList.map(item => {
                          return el('div', {
                            key: item.id,
                            className: 'shrestha-dual-item shrestha-dual-available-item',
                            title: __('Click to add to Selected list', 'shrestha-core'),
                            onClick: () => addToSelected(item.id)
                          },
                            el('div', { className: 'shrestha-dual-item-title' }, item.title),
                            el('div', { className: 'shrestha-dual-item-sub' }, item.subtitle || `ID: ${item.id}`)
                          );
                        })
                  )
                ),

                // Right Column: Selected Statues
                el('div', { className: 'shrestha-dual-list-box' },
                  el('div', { className: 'shrestha-dual-list-header' }, __('Selected Statues', 'shrestha-core')),
                  el('div', { className: 'shrestha-dual-list-items' },
                    selectedList.length === 0
                      ? el('div', { className: 'shrestha-dual-list-empty' }, __('No statues selected. Click on the left to add.', 'shrestha-core'))
                      : selectedList.map((item, idx) => {
                          return el('div', {
                            key: item.id + '-' + idx,
                            className: 'shrestha-dual-item shrestha-dual-selected-item'
                          },
                            el('div', { className: 'shrestha-dual-item-content' },
                              el('div', { className: 'shrestha-dual-item-title' }, item.title),
                              el('div', { className: 'shrestha-dual-item-sub' }, item.subtitle || `ID: ${item.id}`)
                            ),
                            el('div', { className: 'shrestha-dual-item-actions' },
                              el('button', {
                                type: 'button',
                                className: 'shrestha-transfer-btn' + (idx === 0 ? ' is-disabled' : ''),
                                disabled: idx === 0,
                                onClick: () => moveUp(idx)
                              }, __('Up', 'shrestha-core')),
                              el('button', {
                                type: 'button',
                                className: 'shrestha-transfer-btn shrestha-transfer-btn-active' + (idx === selectedList.length - 1 ? ' is-disabled' : ''),
                                disabled: idx === selectedList.length - 1,
                                onClick: () => moveDown(idx)
                              }, __('Down', 'shrestha-core')),
                              el('button', {
                                type: 'button',
                                className: 'shrestha-transfer-remove-btn',
                                onClick: () => removeFromSelected(idx)
                              }, __('Remove', 'shrestha-core'))
                            )
                          );
                        })
                  ),
                  el('div', { className: 'shrestha-dual-list-footer' },
                    'Saved  order:  ' + (selectedIds.length > 0 ? selectedIds.join(',') : 'none')
                  )
                )
              ) : el('div', { className: 'shrestha-dynamic-notice' },
                __('⚡ Automatic Mode active: The block will automatically query the latest published statues and specimens in real time.', 'shrestha-core')
              ),

              // NUMBER OF STATUES TO DISPLAY Slider & Box
              el('div', { className: 'shrestha-range-section' },
                el('label', { className: 'shrestha-field-label-bold' }, __('NUMBER OF STATUES TO DISPLAY', 'shrestha-core')),
                el('div', { className: 'shrestha-range-control-row' },
                  el('input', {
                    type: 'range',
                    min: '1',
                    max: '12',
                    step: '1',
                    className: 'shrestha-custom-slider',
                    value: numberOfPosts,
                    onChange: (e) => handleSliderChange(e.target.value)
                  }),
                  el('input', {
                    type: 'number',
                    min: '1',
                    max: '12',
                    className: 'shrestha-custom-slider-num',
                    value: numberOfPosts,
                    onChange: (e) => handleSliderChange(e.target.value)
                  })
                )
              )
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     4. LOST-WAX FOUNDRY METHOD BLOCK
     ========================================================================= */
  const defaultLostWaxStats = [
    { icon: 'sparkles', value: '600+', label: 'Sacred Icons Crafted' },
    { icon: 'users', value: '30+', label: 'Master Artisans & Specialists' },
    { icon: 'clock', value: '4-8 WEEKS', label: 'Typical Casting Timeline' }
  ];

  const defaultLostWaxSteps = [
    {
      number: '01',
      title: 'WAX MODELLING',
      description: 'The sacred figure is modelled in wax according to prescribed proportions and iconometric measurements.',
      badge: 'FORM',
      icon: 'shapes'
    },
    {
      number: '02',
      title: 'CLAY INVESTMENT',
      description: 'Local Kathmandu Valley clay and rice-husk material gradually encases the wax model in multiple layers.',
      badge: 'SHELL',
      icon: 'layers'
    },
    {
      number: '03',
      title: 'SACRED ALLOY',
      description: 'The wax is removed and molten Ashtadhatu or selected bronze alloy is introduced into the prepared mould.',
      badge: 'CAST',
      icon: 'flame'
    },
    {
      number: '04',
      title: 'CHISELING & GILDING',
      description: 'Cold-chiseling, polishing, fire gilding and final hand-painted details complete the sacred image.',
      badge: 'FINISH',
      icon: 'sparkles'
    }
  ];

  const defaultLostWaxFeatures = [
    { icon: 'globe', title: 'Worldwide', subtitle: 'Secure Shipping' },
    { icon: 'ruler', title: 'Custom Dimensions', subtitle: 'On Request' },
    { icon: 'shield-check', title: 'Lifetime Care', subtitle: '& Maintenance' },
    { icon: 'flame', title: 'Monastic Blessing', subtitle: 'Available' },
    { icon: 'award', title: 'Certificate of Authenticity', subtitle: 'Included' }
  ];

  registerBlockType('shrestha/lost-wax-process', {
    title: __('Foundry Method: From Wax to Presence', 'shrestha-core'),
    description: __('The 4-step Patan foundry methodology with stats and credentials bar.', 'shrestha-core'),
    icon: 'excerpt-view',
    category: 'shrestha-blocks',
    attributes: {
      kickerIcon: { type: 'string', default: 'flame' },
      subtitle: { type: 'string', default: 'OUR PROCESS' },
      title: { type: 'string', default: 'FROM WAX' },
      titleLine2: { type: 'string', default: 'TO PRESENCE.' },
      description: { type: 'string', default: 'Every figure emerging from our Patan foundry follows strict iconometric proportions derived from Sanskrit treatises such as the Sāmāṅgara Sūtradhāra.' },
      stats: { type: 'array', default: defaultLostWaxStats },
      steps: { type: 'array', default: defaultLostWaxSteps },
      features: { type: 'array', default: defaultLostWaxFeatures }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;

      const currentStats = Array.isArray(attributes.stats) && attributes.stats.length > 0
        ? attributes.stats
        : defaultLostWaxStats;

      const currentSteps = Array.isArray(attributes.steps) && attributes.steps.length > 0
        ? attributes.steps
        : defaultLostWaxSteps;

      const currentFeatures = Array.isArray(attributes.features) && attributes.features.length > 0
        ? attributes.features
        : defaultLostWaxFeatures;

      // Re-initialize Lucide Icons on item change
      element.useEffect(() => {
        if (window.lucide && typeof window.lucide.createIcons === 'function') {
          try {
            window.lucide.createIcons();
          } catch (e) {}
        }
      }, [currentStats, currentSteps, currentFeatures]);

      // --- Stats Handlers ---
      const updateStat = (index, key, val) => {
        const next = [...currentStats];
        next[index] = { ...next[index], [key]: val };
        setAttributes({ stats: next });
      };

      const addStat = () => {
        const next = [
          ...currentStats,
          { icon: 'award', value: '100%', label: 'New Metric Counter' }
        ];
        setAttributes({ stats: next });
      };

      const removeStat = (index) => {
        if (currentStats.length <= 1) {
          alert(__('At least one statistics counter is required.', 'shrestha-core'));
          return;
        }
        const next = currentStats.filter((_, idx) => idx !== index);
        setAttributes({ stats: next });
      };

      const moveStat = (index, direction) => {
        const nextIndex = index + direction;
        if (nextIndex < 0 || nextIndex >= currentStats.length) return;
        const next = [...currentStats];
        const temp = next[index];
        next[index] = next[nextIndex];
        next[nextIndex] = temp;
        setAttributes({ stats: next });
      };

      // --- Steps Handlers ---
      const updateStep = (index, key, val) => {
        const next = [...currentSteps];
        next[index] = { ...next[index], [key]: val };
        setAttributes({ steps: next });
      };

      const addStep = () => {
        const numStr = String(currentSteps.length + 1).padStart(2, '0');
        const next = [
          ...currentSteps,
          {
            number: numStr,
            title: 'NEW PROCESS STEP',
            description: 'Description of the casting or finishing stage.',
            badge: 'STEP',
            icon: 'sparkles'
          }
        ];
        setAttributes({ steps: next });
      };

      const removeStep = (index) => {
        if (currentSteps.length <= 1) {
          alert(__('At least one process step is required.', 'shrestha-core'));
          return;
        }
        const next = currentSteps.filter((_, idx) => idx !== index);
        setAttributes({ steps: next });
      };

      const moveStep = (index, direction) => {
        const nextIndex = index + direction;
        if (nextIndex < 0 || nextIndex >= currentSteps.length) return;
        const next = [...currentSteps];
        const temp = next[index];
        next[index] = next[nextIndex];
        next[nextIndex] = temp;
        setAttributes({ steps: next });
      };

      // --- Features Handlers ---
      const updateFeature = (index, key, val) => {
        const next = [...currentFeatures];
        next[index] = { ...next[index], [key]: val };
        setAttributes({ features: next });
      };

      const addFeature = () => {
        const next = [
          ...currentFeatures,
          { icon: 'check-circle', title: 'New Guarantee', subtitle: 'Atelier Quality' }
        ];
        setAttributes({ features: next });
      };

      const removeFeature = (index) => {
        if (currentFeatures.length <= 1) {
          alert(__('At least one guarantee badge is required.', 'shrestha-core'));
          return;
        }
        const next = currentFeatures.filter((_, idx) => idx !== index);
        setAttributes({ features: next });
      };

      const moveFeature = (index, direction) => {
        const nextIndex = index + direction;
        if (nextIndex < 0 || nextIndex >= currentFeatures.length) return;
        const next = [...currentFeatures];
        const temp = next[index];
        next[index] = next[nextIndex];
        next[nextIndex] = temp;
        setAttributes({ features: next });
      };

      return el(AccordionCard, {
        icon: '🔥',
        title: __('Front Page: Foundry Method (From Wax to Presence)', 'shrestha-core'),
        subtitle: __('Foundry method header, stats counters, 4-step casting timeline, and trust guarantees bar', 'shrestha-core'),
        rows: [
          // 1. Section Header & Narrative
          {
            title: __('1. Section Header & Narrative Story', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-fields-wrapper' },
              el('div', { className: 'shrestha-block-field-grid' },
                el(TextControl, {
                  label: __('Kicker Icon (Lucide Slug)', 'shrestha-core'),
                  value: attributes.kickerIcon || 'flame',
                  placeholder: 'flame',
                  onChange: val => setAttributes({ kickerIcon: (val || '').toLowerCase().trim() })
                }),
                el(TextControl, {
                  label: __('Kicker Subtitle Text', 'shrestha-core'),
                  value: attributes.subtitle,
                  placeholder: 'OUR PROCESS',
                  onChange: val => setAttributes({ subtitle: val })
                }),
                el(TextControl, {
                  label: __('Headline Title (First Line)', 'shrestha-core'),
                  value: attributes.title,
                  placeholder: 'FROM WAX',
                  onChange: val => setAttributes({ title: val })
                }),
                el(TextControl, {
                  label: __('Headline Title (Second Line)', 'shrestha-core'),
                  value: attributes.titleLine2 || 'TO PRESENCE.',
                  placeholder: 'TO PRESENCE.',
                  onChange: val => setAttributes({ titleLine2: val })
                })
              ),
              el('div', { style: { marginTop: '16px' } },
                el(ShresthaClassicEditor, {
                  label: __('Narrative Body Story Text', 'shrestha-core'),
                  value: attributes.description,
                  onChange: val => setAttributes({ description: val })
                })
              )
            )
          },

          // 2. Statistics & Metrics Counters
          {
            title: __('2. Atelier Metrics & Statistics (' + currentStats.length + ' Counters)', 'shrestha-core'),
            content: el('div', { className: 'shrestha-ticker-list-wrapper' },
              currentStats.map((st, idx) => {
                const iconSlug = st.icon || 'sparkles';
                return el('div', { key: idx, className: 'shrestha-ticker-item-card' },
                  el('div', { className: 'shrestha-ticker-item-header' },
                    el('div', { className: 'shrestha-ticker-badge-group' },
                      el('span', { className: 'shrestha-ticker-item-num' }, __('Counter #' + (idx + 1), 'shrestha-core')),
                      el('strong', { style: { fontSize: '13px', color: '#0f172a' } }, st.value || '0+'),
                      el('span', { className: 'shrestha-ticker-icon-preview-tag' },
                        el('i', { 'data-lucide': iconSlug, className: 'shrestha-lucide-inline-icon', style: { display: 'inline-block', width: '14px', height: '14px', verticalAlign: 'middle', marginRight: '4px' } }),
                        el('code', {}, iconSlug)
                      )
                    ),
                    el('div', { className: 'shrestha-ticker-item-actions' },
                      idx > 0 ? el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn',
                        title: 'Move Up',
                        onClick: () => moveStat(idx, -1)
                      }, '↑') : null,
                      idx < currentStats.length - 1 ? el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn',
                        title: 'Move Down',
                        onClick: () => moveStat(idx, 1)
                      }, '↓') : null,
                      el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn shrestha-ticker-remove-btn',
                        title: 'Remove Counter',
                        onClick: () => removeStat(idx)
                      }, '🗑️ ' + __('Remove', 'shrestha-core'))
                    )
                  ),
                  el('div', { className: 'shrestha-card-fields-grid' },
                    el(TextControl, {
                      label: __('Lucide Icon Slug', 'shrestha-core'),
                      value: st.icon || '',
                      placeholder: 'sparkles, users, clock...',
                      help: el('span', { style: { fontSize: '11px', display: 'block', marginTop: '2px' } },
                        __('Browse icons at ', 'shrestha-core'),
                        el('a', { href: 'https://lucide.dev/icons', target: '_blank', rel: 'noopener noreferrer', style: { color: '#d49b4b', fontWeight: 600 } }, 'lucide.dev/icons ↗')
                      ),
                      onChange: val => updateStat(idx, 'icon', (val || '').toLowerCase().trim())
                    }),
                    el(TextControl, {
                      label: __('Counter Value / Number', 'shrestha-core'),
                      value: st.value || '',
                      placeholder: '600+, 30+, 4-8 WEEKS',
                      onChange: val => updateStat(idx, 'value', val)
                    })
                  ),
                  el('div', { style: { marginTop: '10px' } },
                    el(TextControl, {
                      label: __('Label / Subtitle Text', 'shrestha-core'),
                      value: st.label || '',
                      placeholder: 'Sacred Icons Crafted',
                      onChange: val => updateStat(idx, 'label', val)
                    })
                  )
                );
              }),
              el('div', { style: { display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginTop: '10px' } },
                el('button', {
                  type: 'button',
                  className: 'button button-primary shrestha-ticker-add-btn',
                  onClick: addStat
                }, '➕ ' + __('Add New Metric Counter', 'shrestha-core')),
                el('span', { style: { fontSize: '11.5px', color: '#64748b' } },
                  __('Counters appear side-by-side underneath the narrative story.', 'shrestha-core')
                )
              )
            )
          },

          // 3. Four-Step Casting Methodology
          {
            title: __('3. Four Casting Methodology Steps (' + currentSteps.length + ' Steps)', 'shrestha-core'),
            content: el('div', { className: 'shrestha-ticker-list-wrapper' },
              currentSteps.map((step, idx) => {
                const iconSlug = step.icon || 'shapes';
                return el('div', { key: idx, className: 'shrestha-specimen-card-editor' },
                  el('div', { className: 'shrestha-card-editor-header' },
                    el('div', { className: 'shrestha-card-title-group' },
                      el('span', { className: 'shrestha-card-num-badge' }, __('Step #' + (step.number || String(idx + 1).padStart(2, '0')), 'shrestha-core')),
                      el('strong', { className: 'shrestha-card-editor-name' }, step.title || 'Untitled Step'),
                      el('span', { className: 'shrestha-card-editor-sku' }, `[${step.badge || 'STEP'}]`),
                      el('span', { className: 'shrestha-ticker-icon-preview-tag' },
                        el('i', { 'data-lucide': iconSlug, className: 'shrestha-lucide-inline-icon', style: { display: 'inline-block', width: '14px', height: '14px', verticalAlign: 'middle', marginRight: '4px' } }),
                        el('code', {}, iconSlug)
                      )
                    ),
                    el('div', { className: 'shrestha-card-editor-actions' },
                      idx > 0 ? el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn',
                        title: 'Move Up',
                        onClick: () => moveStep(idx, -1)
                      }, '↑') : null,
                      idx < currentSteps.length - 1 ? el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn',
                        title: 'Move Down',
                        onClick: () => moveStep(idx, 1)
                      }, '↓') : null,
                      el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn shrestha-ticker-remove-btn',
                        title: 'Remove Step',
                        onClick: () => removeStep(idx)
                      }, '🗑️ ' + __('Remove', 'shrestha-core'))
                    )
                  ),
                  el('div', { className: 'shrestha-card-fields-grid' },
                    el(TextControl, {
                      label: __('Step Number (e.g. 01, 02)', 'shrestha-core'),
                      value: step.number || '',
                      placeholder: '01',
                      onChange: val => updateStep(idx, 'number', val)
                    }),
                    el(TextControl, {
                      label: __('Step Title', 'shrestha-core'),
                      value: step.title || '',
                      placeholder: 'WAX MODELLING',
                      onChange: val => updateStep(idx, 'title', val)
                    }),
                    el(TextControl, {
                      label: __('Badge / Tag Label', 'shrestha-core'),
                      value: step.badge || '',
                      placeholder: 'FORM, SHELL, CAST, FINISH',
                      onChange: val => updateStep(idx, 'badge', val)
                    }),
                    el(TextControl, {
                      label: __('Lucide Icon Slug', 'shrestha-core'),
                      value: step.icon || '',
                      placeholder: 'shapes, layers, flame, sparkles',
                      help: el('span', { style: { fontSize: '11px', display: 'block', marginTop: '2px' } },
                        __('Browse at ', 'shrestha-core'),
                        el('a', { href: 'https://lucide.dev/icons', target: '_blank', rel: 'noopener noreferrer', style: { color: '#d49b4b', fontWeight: 600 } }, 'lucide.dev/icons ↗')
                      ),
                      onChange: val => updateStep(idx, 'icon', (val || '').toLowerCase().trim())
                    })
                  ),
                  el('div', { style: { marginTop: '12px' } },
                    el(TextareaControl, {
                      label: __('Step Description Details', 'shrestha-core'),
                      value: step.description || '',
                      rows: 3,
                      placeholder: 'The sacred figure is modelled in wax according to prescribed proportions...',
                      onChange: val => updateStep(idx, 'description', val)
                    })
                  )
                );
              }),
              el('div', { style: { display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginTop: '10px' } },
                el('button', {
                  type: 'button',
                  className: 'button button-primary shrestha-ticker-add-btn',
                  onClick: addStep
                }, '➕ ' + __('Add New Methodology Step', 'shrestha-core')),
                el('span', { style: { fontSize: '11.5px', color: '#64748b' } },
                  __('Steps render in the right-hand card with numbers, badges, and icon indicators.', 'shrestha-core')
                )
              )
            )
          },

          // 4. Bottom Guarantees & Features Bar
          {
            title: __('4. Guarantees & Trust Features Bar (' + currentFeatures.length + ' Badges)', 'shrestha-core'),
            content: el('div', { className: 'shrestha-ticker-list-wrapper' },
              currentFeatures.map((feat, idx) => {
                const iconSlug = feat.icon || 'globe';
                return el('div', { key: idx, className: 'shrestha-ticker-item-card' },
                  el('div', { className: 'shrestha-ticker-item-header' },
                    el('div', { className: 'shrestha-ticker-badge-group' },
                      el('span', { className: 'shrestha-ticker-item-num' }, __('Badge #' + (idx + 1), 'shrestha-core')),
                      el('strong', { style: { fontSize: '13px', color: '#0f172a' } }, feat.title || 'Untitled Feature'),
                      el('span', { className: 'shrestha-ticker-icon-preview-tag' },
                        el('i', { 'data-lucide': iconSlug, className: 'shrestha-lucide-inline-icon', style: { display: 'inline-block', width: '14px', height: '14px', verticalAlign: 'middle', marginRight: '4px' } }),
                        el('code', {}, iconSlug)
                      )
                    ),
                    el('div', { className: 'shrestha-ticker-item-actions' },
                      idx > 0 ? el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn',
                        title: 'Move Left',
                        onClick: () => moveFeature(idx, -1)
                      }, '←') : null,
                      idx < currentFeatures.length - 1 ? el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn',
                        title: 'Move Right',
                        onClick: () => moveFeature(idx, 1)
                      }, '→') : null,
                      el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn shrestha-ticker-remove-btn',
                        title: 'Remove Feature',
                        onClick: () => removeFeature(idx)
                      }, '🗑️ ' + __('Remove', 'shrestha-core'))
                    )
                  ),
                  el('div', { className: 'shrestha-card-fields-grid' },
                    el(TextControl, {
                      label: __('Lucide Icon Slug', 'shrestha-core'),
                      value: feat.icon || '',
                      placeholder: 'globe, ruler, shield-check, flame, award',
                      help: el('span', { style: { fontSize: '11px', display: 'block', marginTop: '2px' } },
                        __('Browse icons at ', 'shrestha-core'),
                        el('a', { href: 'https://lucide.dev/icons', target: '_blank', rel: 'noopener noreferrer', style: { color: '#d49b4b', fontWeight: 600 } }, 'lucide.dev/icons ↗')
                      ),
                      onChange: val => updateFeature(idx, 'icon', (val || '').toLowerCase().trim())
                    }),
                    el(TextControl, {
                      label: __('Feature Title', 'shrestha-core'),
                      value: feat.title || '',
                      placeholder: 'Worldwide, Custom Dimensions...',
                      onChange: val => updateFeature(idx, 'title', val)
                    })
                  ),
                  el('div', { style: { marginTop: '10px' } },
                    el(TextControl, {
                      label: __('Feature Subtitle / Status', 'shrestha-core'),
                      value: feat.subtitle || '',
                      placeholder: 'Secure Shipping, On Request, Included...',
                      onChange: val => updateFeature(idx, 'subtitle', val)
                    })
                  )
                );
              }),
              el('div', { style: { display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginTop: '10px' } },
                el('button', {
                  type: 'button',
                  className: 'button button-primary shrestha-ticker-add-btn',
                  onClick: addFeature
                }, '➕ ' + __('Add New Guarantee Badge', 'shrestha-core')),
                el('span', { style: { fontSize: '11.5px', color: '#64748b' } },
                  __('Displays in the horizontal bottom banner across the section.', 'shrestha-core')
                )
              )
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     5. CRAFTED WITH HERITAGE BLOCK
     ========================================================================= */
  const defaultMasterArtisanCards = [
    {
      icon: 'feather',
      title: 'Authentic Nepalese Craftsmanship',
      description: 'Each sculpture is created in Nepal using traditional metalworking techniques shaped by generations of artistic knowledge and heritage.'
    },
    {
      icon: 'user',
      title: 'Handcrafted, Never Mass Produced',
      description: 'Every statue passes through skilled artisan hands. From wax modeling to finishing, no piece is simply taken from a production line.'
    },
    {
      icon: 'timer',
      title: 'Meticulous Detail & Proportion',
      description: 'Facial expressions, hand gestures, ornaments and traditional proportions are carefully refined to preserve the character of each deity.'
    },
    {
      icon: 'star',
      title: 'Premium Metal & Finishes',
      description: 'We work with carefully selected bronze, brass, copper and refined finishes to create sculptures with depth, character and lasting beauty.'
    },
    {
      icon: 'crosshair',
      title: 'Custom Commissions',
      description: 'From intimate altar pieces to large sacred sculptures, we can create custom dimensions, finishes and specifications for individual commissions.'
    },
    {
      icon: 'globe',
      title: 'Worldwide Delivery',
      description: 'Your sculpture is carefully inspected, protected and prepared for secure international delivery from our workshop to your collection or sacred space.'
    }
  ];

  registerBlockType('shrestha/master-artisans', {
    title: __('Crafted with Heritage, Made to Last', 'shrestha-core'),
    description: __('Features grid highlighting authentic Newar craftsmanship and standards.', 'shrestha-core'),
    icon: 'admin-users',
    category: 'shrestha-blocks',
    attributes: {
      title: { type: 'string', default: 'Crafted with Heritage, Made to Last' },
      subtitle: { type: 'string', default: 'What makes our sacred sculptures different is the craftsmanship, patience and Nepalese heritage behind every piece we create.' },
      cards: { type: 'array', default: defaultMasterArtisanCards }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;

      const currentCards = Array.isArray(attributes.cards) && attributes.cards.length > 0
        ? attributes.cards
        : defaultMasterArtisanCards;

      element.useEffect(() => {
        if (window.lucide && typeof window.lucide.createIcons === 'function') {
          try {
            window.lucide.createIcons();
          } catch (e) {}
        }
      }, [currentCards]);

      const updateCard = (index, key, val) => {
        const next = [...currentCards];
        next[index] = { ...next[index], [key]: val };
        setAttributes({ cards: next });
      };

      const addCard = () => {
        const next = [
          ...currentCards,
          {
            icon: 'award',
            title: 'New Heritage Pillar',
            description: 'Description of the craftsmanship value or atelier tradition.'
          }
        ];
        setAttributes({ cards: next });
      };

      const removeCard = (index) => {
        if (currentCards.length <= 1) {
          alert(__('At least one card is required.', 'shrestha-core'));
          return;
        }
        const next = currentCards.filter((_, idx) => idx !== index);
        setAttributes({ cards: next });
      };

      const moveCard = (index, direction) => {
        const nextIndex = index + direction;
        if (nextIndex < 0 || nextIndex >= currentCards.length) return;
        const next = [...currentCards];
        const temp = next[index];
        next[index] = next[nextIndex];
        next[nextIndex] = temp;
        setAttributes({ cards: next });
      };

      return el(AccordionCard, {
        icon: '🔨',
        title: __('Front Page: Crafted with Heritage, Made to Last', 'shrestha-core'),
        subtitle: __('Atelier craftsmanship standards, value pillars, and guarantees grid', 'shrestha-core'),
        rows: [
          {
            title: __('1. Section Header & Subtitle', 'shrestha-core'),
            content: el('div', {},
              el(TextControl, {
                label: __('Section Headline Title', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(ShresthaClassicEditor, {
                label: __('Subtitle / Description', 'shrestha-core'),
                value: attributes.subtitle,
                onChange: val => setAttributes({ subtitle: val })
              })
            )
          },
          {
            title: __('2. Heritage Pillars & Craftsmanship Cards (' + currentCards.length + ' Cards)', 'shrestha-core'),
            content: el('div', { className: 'shrestha-ticker-list-wrapper' },
              currentCards.map((c, idx) => {
                const iconSlug = c.icon || 'feather';
                return el('div', { key: idx, className: 'shrestha-specimen-card-editor' },
                  el('div', { className: 'shrestha-card-editor-header' },
                    el('div', { className: 'shrestha-card-title-group' },
                      el('span', { className: 'shrestha-card-num-badge' }, __('Card #' + (idx + 1), 'shrestha-core')),
                      el('strong', { className: 'shrestha-card-editor-name' }, c.title || 'Untitled Pillar'),
                      el('span', { className: 'shrestha-ticker-icon-preview-tag' },
                        el('i', { 'data-lucide': iconSlug, className: 'shrestha-lucide-inline-icon', style: { display: 'inline-block', width: '14px', height: '14px', verticalAlign: 'middle', marginRight: '4px' } }),
                        el('code', {}, iconSlug)
                      )
                    ),
                    el('div', { className: 'shrestha-card-editor-actions' },
                      idx > 0 ? el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn',
                        title: 'Move Left / Up',
                        onClick: () => moveCard(idx, -1)
                      }, '↑') : null,
                      idx < currentCards.length - 1 ? el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn',
                        title: 'Move Right / Down',
                        onClick: () => moveCard(idx, 1)
                      }, '↓') : null,
                      el('button', {
                        type: 'button',
                        className: 'shrestha-ticker-action-btn shrestha-ticker-remove-btn',
                        title: 'Remove Card',
                        onClick: () => removeCard(idx)
                      }, '🗑️ ' + __('Remove', 'shrestha-core'))
                    )
                  ),
                  el('div', { className: 'shrestha-card-fields-grid' },
                    el(TextControl, {
                      label: __('Lucide Icon Slug', 'shrestha-core'),
                      value: c.icon || '',
                      placeholder: 'feather, user, timer, star, crosshair, globe',
                      help: el('span', { style: { fontSize: '11px', display: 'block', marginTop: '2px' } },
                        __('Browse icons at ', 'shrestha-core'),
                        el('a', { href: 'https://lucide.dev/icons', target: '_blank', rel: 'noopener noreferrer', style: { color: '#d49b4b', fontWeight: 600 } }, 'lucide.dev/icons ↗')
                      ),
                      onChange: val => updateCard(idx, 'icon', (val || '').toLowerCase().trim())
                    }),
                    el(TextControl, {
                      label: __('Pillar Title', 'shrestha-core'),
                      value: c.title || '',
                      placeholder: 'Authentic Nepalese Craftsmanship',
                      onChange: val => updateCard(idx, 'title', val)
                    })
                  ),
                  el('div', { style: { marginTop: '12px' } },
                    el(TextareaControl, {
                      label: __('Pillar Description', 'shrestha-core'),
                      value: c.description || '',
                      rows: 3,
                      placeholder: 'Each sculpture is created in Nepal using traditional metalworking techniques...',
                      onChange: val => updateCard(idx, 'description', val)
                    })
                  )
                );
              }),
              el('div', { style: { display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginTop: '10px' } },
                el('button', {
                  type: 'button',
                  className: 'button button-primary shrestha-ticker-add-btn',
                  onClick: addCard
                }, '➕ ' + __('Add New Craftsmanship Card', 'shrestha-core')),
                el('span', { style: { fontSize: '11.5px', color: '#64748b' } },
                  __('Cards appear in the 3-column responsive grid on the front page.', 'shrestha-core')
                )
              )
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     6. PATRON REVIEWS & TESTIMONIALS BLOCK
     ========================================================================= */
  const defaultTestimonialsList = [
    {
      stars: 5,
      seal: 'Monastic Seal',
      specimen: 'Green Tara — 24K Gold (22.5 in)',
      quote: '"The iconometric precision of the 124 Angula grid on our Green Tara is flawless. When the 24K mercury gilding caught the butter lamps in the shrine room, the monastic assembly was deeply moved. Shrestha Atelier preserves the true soul of Patan metallurgy."',
      initials: 'LW',
      name: 'Lama Tenzin Wangyal',
      role: 'Abbot, Drukpa Monastery • Paro, Bhutan'
    },
    {
      stars: 5,
      seal: 'Museum Acquisition',
      specimen: 'Mahakala 6-Armed — Ashtadhatu (18 in)',
      quote: '"Acquiring the 6-Armed Mahakala for our Himalayan sacred art gallery exceeded all curatorial expectations. The alloy density, cold-hammered chiseled jewelry, and Sanskrit consecration chamber make this a museum-grade masterpiece."',
      initials: 'DR',
      name: 'Dr. Henriette Richter',
      role: 'Curator of Asian Art, Museum Rietberg • Zurich, Switzerland'
    },
    {
      stars: 5,
      seal: 'Private Collection',
      specimen: 'Shakyamuni Buddha — 24K Gilt Fire Gilding (24 in)',
      quote: '"Commissioning our Shakyamuni Buddha was a transcendent experience. Receiving photo documentation of the lost-wax casting and Patan monastery blessing gave our family a profound spiritual heirloom that will endure for centuries."',
      initials: 'KC',
      name: 'Kenjiro & Saki Takahashi',
      role: 'Private Collectors of Tantric Iconography • Kyoto, Japan'
    },
    {
      stars: 5,
      seal: 'Museum Curator',
      specimen: 'Mahakala 6-Armed Protector',
      quote: '"As a museum curator, finding contemporary lost-wax bronze casting that matches 14th-century Malla dynasty density is exceptionally rare. Spectrometry testing confirmed authentic 8-metal Ashtadhatu alloy. Phenomenal art historical fidelity."',
      initials: 'ES',
      name: 'Dr. Evelyn V. Sterling',
      role: 'Curator, Royal Heritage • London, UK'
    },
    {
      stars: 5,
      seal: 'Verified Collector',
      specimen: 'Shakyamuni Buddha Bhumisparsha',
      quote: '"The cold-gold painted face and hand-chiseled antiqued dark bronze patina have an extraordinary spiritual presence in my gallery. The escrow process was seamless, and the physical certificate signed by Master Rajan Tamrakar gives absolute provenance."',
      initials: 'JM',
      name: 'Jean-Luc Moreau',
      role: 'Sacred Art Collector • Geneva, Switzerland'
    },
    {
      stars: 5,
      seal: 'Monastic Consecration',
      specimen: 'Chenrezig 1000-Armed Compassion',
      quote: '"When our nunnery received the thousand-armed Chenrezig, each hand icon accurately held its sacred implement according to the ancient Tibetan canon. The consecrated hollow core allowed our traditional mantra scrolls and relic pills to be sealed with complete monastic reverence."',
      initials: 'AD',
      name: 'Ani Choying Drolma',
      role: 'Nagi Gompa Hermitage • Kathmandu, Nepal'
    }
  ];

  registerBlockType('shrestha/patron-testimonials', {
    title: __('Testimonials from Our Clients', 'shrestha-core'),
    description: __('Venerated patron testimonials slider with manual or dynamic selection.', 'shrestha-core'),
    icon: 'star-filled',
    category: 'shrestha-blocks',
    attributes: {
      title: { type: 'string', default: 'Testimonials from Our Clients' },
      subtitle: { type: 'string', default: 'Venerated reviews from Buddhist monasteries, museum curators, international collectors, and sacred art connoisseurs across 34 nations.' },
      source: { type: 'string', default: 'dynamic' },
      selectedIds: { type: 'array', default: [] },
      numberOfPosts: { type: 'number', default: 6 },
      testimonials: { type: 'array', default: defaultTestimonialsList }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;

      const source = attributes.source || 'dynamic';
      const selectedIds = Array.isArray(attributes.selectedIds) ? attributes.selectedIds.map(Number) : [];
      const numberOfPosts = typeof attributes.numberOfPosts === 'number' ? attributes.numberOfPosts : 6;

      const rawTestimonials = (window.shresthaCoreData && Array.isArray(window.shresthaCoreData.availableTestimonials) && window.shresthaCoreData.availableTestimonials.length > 0)
        ? window.shresthaCoreData.availableTestimonials
        : [
            { id: 26, title: 'Lama Tenzin Wangyal', subtitle: 'Abbot, Drukpa Monastery • Paro, Bhutan | Monastic Seal | ★★★★★', stars: 5, seal: 'Monastic Seal', specimen: 'Green Tara — 24K Gold (22.5 in)', quote: 'The iconometric precision of the 124 Angula grid on our Green Tara is flawless...', initials: 'LW' },
            { id: 27, title: 'Dr. Henriette Richter', subtitle: 'Curator of Asian Art, Museum Rietberg • Zurich | Museum Acquisition | ★★★★★', stars: 5, seal: 'Museum Acquisition', specimen: 'Mahakala 6-Armed — Ashtadhatu (18 in)', quote: 'Acquiring the 6-Armed Mahakala for our Himalayan sacred art gallery exceeded all curatorial expectations...', initials: 'DR' },
            { id: 28, title: 'Kenjiro & Saki Takahashi', subtitle: 'Private Collectors • Kyoto, Japan | Private Collection | ★★★★★', stars: 5, seal: 'Private Collection', specimen: 'Shakyamuni Buddha (24 in)', quote: 'Commissioning our Shakyamuni Buddha was a transcendent experience...', initials: 'KC' }
          ];

      // Map testimonials by ID for quick lookup
      const testimonialMap = {};
      rawTestimonials.forEach(t => {
        testimonialMap[Number(t.id)] = t;
      });

      // Filter available list: items not currently in selectedIds
      const availableList = rawTestimonials.filter(t => !selectedIds.includes(Number(t.id)));

      // Selected list: mapped objects in exact order of selectedIds
      const selectedList = selectedIds.map(id => {
        return testimonialMap[Number(id)] || {
          id: id,
          title: 'Testimonial #' + id,
          subtitle: 'Patron Review #' + id
        };
      });

      const addToSelected = (postId) => {
        const idNum = Number(postId);
        if (!selectedIds.includes(idNum)) {
          setAttributes({ selectedIds: [...selectedIds, idNum] });
        }
      };

      const removeFromSelected = (index) => {
        const updated = selectedIds.filter((_, idx) => idx !== index);
        setAttributes({ selectedIds: updated });
      };

      const moveUp = (index) => {
        if (index <= 0) return;
        const updated = [...selectedIds];
        const temp = updated[index];
        updated[index] = updated[index - 1];
        updated[index - 1] = temp;
        setAttributes({ selectedIds: updated });
      };

      const moveDown = (index) => {
        if (index >= selectedIds.length - 1) return;
        const updated = [...selectedIds];
        const temp = updated[index];
        updated[index] = updated[index + 1];
        updated[index + 1] = temp;
        setAttributes({ selectedIds: updated });
      };

      const handleSliderChange = (val) => {
        const num = parseInt(val, 10);
        if (!isNaN(num) && num >= 1) {
          setAttributes({ numberOfPosts: num });
        }
      };

      const adminUrl = (window.shresthaCoreData && window.shresthaCoreData.siteUrl) ? window.shresthaCoreData.siteUrl : '/';

      return el(AccordionCard, {
        icon: '⭐',
        title: __('Front Page: Patron Testimonials & Reviews', 'shrestha-core'),
        subtitle: __('Client reviews slider query & dual-list card selector', 'shrestha-core'),
        rows: [
          {
            title: __('1. Section Header & Subtitle', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Section Headline Title', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(ShresthaClassicEditor, {
                label: __('Subtitle / Description', 'shrestha-core'),
                value: attributes.subtitle,
                onChange: val => setAttributes({ subtitle: val })
              })
            )
          },
          {
            title: __('2. Testimonial Selection & Display Query', 'shrestha-core'),
            content: el('div', { className: 'shrestha-showcase-transfer-wrapper' },
              // SOURCE Dropdown
              el('div', { className: 'shrestha-source-control-wrap' },
                el('label', { className: 'shrestha-field-label-bold' }, __('SOURCE', 'shrestha-core')),
                el('select', {
                  className: 'shrestha-source-select',
                  value: source,
                  onChange: (e) => setAttributes({ source: e.target.value })
                },
                  el('option', { value: 'manual' }, __('Choose Testimonials Manually', 'shrestha-core')),
                  el('option', { value: 'dynamic' }, __('Latest Testimonials (Automatic)', 'shrestha-core'))
                )
              ),

              // Dual-List Box if manual
              source === 'manual' ? el('div', { className: 'shrestha-dual-list-container' },
                // Left Column: Available Testimonials
                el('div', { className: 'shrestha-dual-list-box' },
                  el('div', { className: 'shrestha-dual-list-header' }, __('Available Testimonials', 'shrestha-core')),
                  el('div', { className: 'shrestha-dual-list-items' },
                    availableList.length === 0
                      ? el('div', { className: 'shrestha-dual-list-empty' }, __('All testimonials are selected', 'shrestha-core'))
                      : availableList.map(item => {
                          return el('div', {
                            key: item.id,
                            className: 'shrestha-dual-item shrestha-dual-available-item',
                            title: __('Click to add to Selected list', 'shrestha-core'),
                            onClick: () => addToSelected(item.id)
                          },
                            el('div', { className: 'shrestha-dual-item-title' }, item.title),
                            el('div', { className: 'shrestha-dual-item-sub' }, item.subtitle || `ID: ${item.id}`)
                          );
                        })
                  )
                ),

                // Right Column: Selected Testimonials
                el('div', { className: 'shrestha-dual-list-box' },
                  el('div', { className: 'shrestha-dual-list-header' }, __('Selected Testimonials', 'shrestha-core')),
                  el('div', { className: 'shrestha-dual-list-items' },
                    selectedList.length === 0
                      ? el('div', { className: 'shrestha-dual-list-empty' }, __('No testimonials selected. Click on the left to add.', 'shrestha-core'))
                      : selectedList.map((item, idx) => {
                          return el('div', {
                            key: item.id + '-' + idx,
                            className: 'shrestha-dual-item shrestha-dual-selected-item'
                          },
                            el('div', { className: 'shrestha-dual-item-content' },
                              el('div', { className: 'shrestha-dual-item-title' }, item.title),
                              el('div', { className: 'shrestha-dual-item-sub' }, item.subtitle || `ID: ${item.id}`)
                            ),
                            el('div', { className: 'shrestha-dual-item-actions' },
                              el('button', {
                                type: 'button',
                                className: 'shrestha-transfer-btn' + (idx === 0 ? ' is-disabled' : ''),
                                disabled: idx === 0,
                                onClick: () => moveUp(idx)
                              }, __('Up', 'shrestha-core')),
                              el('button', {
                                type: 'button',
                                className: 'shrestha-transfer-btn shrestha-transfer-btn-active' + (idx === selectedList.length - 1 ? ' is-disabled' : ''),
                                disabled: idx === selectedList.length - 1,
                                onClick: () => moveDown(idx)
                              }, __('Down', 'shrestha-core')),
                              el('button', {
                                type: 'button',
                                className: 'shrestha-transfer-remove-btn',
                                onClick: () => removeFromSelected(idx)
                              }, __('Remove', 'shrestha-core'))
                            )
                          );
                        })
                  ),
                  el('div', { className: 'shrestha-dual-list-footer' },
                    'Saved  order:  ' + (selectedIds.length > 0 ? selectedIds.join(',') : 'none')
                  )
                )
              ) : el('div', { className: 'shrestha-dynamic-notice' },
                __('⚡ Automatic Mode active: The block will automatically query the latest published testimonials in real time.', 'shrestha-core')
              ),

              // NUMBER OF TESTIMONIALS TO DISPLAY Slider & Box
              el('div', { className: 'shrestha-range-section' },
                el('label', { className: 'shrestha-field-label-bold' }, __('NUMBER OF TESTIMONIALS TO DISPLAY', 'shrestha-core')),
                el('div', { className: 'shrestha-range-control-row' },
                  el('input', {
                    type: 'range',
                    min: '1',
                    max: '12',
                    step: '1',
                    className: 'shrestha-custom-slider',
                    value: numberOfPosts,
                    onChange: (e) => handleSliderChange(e.target.value)
                  }),
                  el('input', {
                    type: 'number',
                    min: '1',
                    max: '12',
                    className: 'shrestha-custom-number-box',
                    value: numberOfPosts,
                    onChange: (e) => handleSliderChange(e.target.value)
                  })
                )
              ),

              // Quick Admin Links
              el('div', { style: { marginTop: '18px', paddingTop: '14px', borderTop: '1px solid #334155', display: 'flex', gap: '10px', alignItems: 'center', flexWrap: 'wrap' } },
                el('a', {
                  href: adminUrl + 'wp-admin/edit.php?post_type=testimonial',
                  target: '_blank',
                  className: 'button button-secondary',
                  style: { fontSize: '12px' }
                }, '⭐ ' + __('Manage Patron Reviews in WP Admin', 'shrestha-core')),
                el('a', {
                  href: adminUrl + 'wp-admin/post-new.php?post_type=testimonial',
                  target: '_blank',
                  className: 'button button-secondary',
                  style: { fontSize: '12px' }
                }, '➕ ' + __('Add New Review Post', 'shrestha-core'))
              )
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     7. ABOUT HERO BLOCK
     ========================================================================= */
  registerBlockType('shrestha/about-hero', {
    title: __('About Hero Banner', 'shrestha-core'),
    description: __('Hero banner for the About Us page with stats and provenance pills.', 'shrestha-core'),
    icon: 'id',
    category: 'shrestha-blocks',
    attributes: {
      badgeText: { type: 'string', default: 'ABOUT SHRESTHA HANDICRAFT' },
      title: { type: 'string', default: 'Sacred Bronze Sculpting,' },
      titleHighlight: { type: 'string', default: 'Five Generations in Patan.' },
      description: { type: 'string', default: 'For over four decades, our family foundry in Patan has preserved the sacred Newar tradition of lost-wax bronze casting — creating authentic, iconometrically precise Buddhist and Hindu deity statues for monasteries, temples, and collectors worldwide.' },
      establishedText: { type: 'string', default: 'FOUNDED 1982' },
      locationText: { type: 'string', default: 'PATAN, NEPAL' },
      heritagePillText: { type: 'string', default: 'UNESCO HERITAGE CRAFT' },
      primaryBtnText: { type: 'string', default: 'EXPLORE OUR STORY' },
      primaryBtnUrl: { type: 'string', default: '#our-story' },
      secondaryBtnText: { type: 'string', default: 'VISIT ATELIER' },
      secondaryBtnUrl: { type: 'string', default: '#atelier' },
      stat1Value: { type: 'string', default: '40+' },
      stat1Label: { type: 'string', default: 'Years of Casting Heritage' },
      stat2Value: { type: 'string', default: '50+' },
      stat2Label: { type: 'string', default: 'Monasteries & Temples Supplied' },
      stat3Value: { type: 'string', default: '100%' },
      stat3Label: { type: 'string', default: 'Authentic Lost-Wax Process' }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '🏛️',
        title: __('About: Hero & Heritage Introduction', 'shrestha-core'),
        subtitle: __('Top hero banner with provenance badges, CTA buttons & foundry statistics', 'shrestha-core'),
        rows: [
          {
            title: __('1. Badges & Headline', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Pill Tag Badge', 'shrestha-core'),
                value: attributes.badgeText,
                onChange: val => setAttributes({ badgeText: val })
              }),
              el(TextControl, {
                label: __('Title Main Text', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Title Gradient Highlight', 'shrestha-core'),
                value: attributes.titleHighlight,
                onChange: val => setAttributes({ titleHighlight: val })
              }),
              el(TextareaControl, {
                label: __('Hero Narrative Description', 'shrestha-core'),
                value: attributes.description,
                rows: 3,
                onChange: val => setAttributes({ description: val })
              })
            )
          },
          {
            title: __('2. Provenance Pills & Action Buttons', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Established Pill Text', 'shrestha-core'),
                value: attributes.establishedText,
                onChange: val => setAttributes({ establishedText: val })
              }),
              el(TextControl, {
                label: __('Location Pill Text', 'shrestha-core'),
                value: attributes.locationText,
                onChange: val => setAttributes({ locationText: val })
              }),
              el(TextControl, {
                label: __('Heritage Pill Text', 'shrestha-core'),
                value: attributes.heritagePillText,
                onChange: val => setAttributes({ heritagePillText: val })
              }),
              el(TextControl, {
                label: __('Primary Button Text', 'shrestha-core'),
                value: attributes.primaryBtnText,
                onChange: val => setAttributes({ primaryBtnText: val })
              }),
              el(TextControl, {
                label: __('Primary Button URL', 'shrestha-core'),
                value: attributes.primaryBtnUrl,
                onChange: val => setAttributes({ primaryBtnUrl: val })
              }),
              el(TextControl, {
                label: __('Secondary Button Text', 'shrestha-core'),
                value: attributes.secondaryBtnText,
                onChange: val => setAttributes({ secondaryBtnText: val })
              }),
              el(TextControl, {
                label: __('Secondary Button URL', 'shrestha-core'),
                value: attributes.secondaryBtnUrl,
                onChange: val => setAttributes({ secondaryBtnUrl: val })
              })
            )
          },
          {
            title: __('3. Key Foundry Statistics', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Stat 1 Value', 'shrestha-core'),
                value: attributes.stat1Value,
                onChange: val => setAttributes({ stat1Value: val })
              }),
              el(TextControl, {
                label: __('Stat 1 Label', 'shrestha-core'),
                value: attributes.stat1Label,
                onChange: val => setAttributes({ stat1Label: val })
              }),
              el(TextControl, {
                label: __('Stat 2 Value', 'shrestha-core'),
                value: attributes.stat2Value,
                onChange: val => setAttributes({ stat2Value: val })
              }),
              el(TextControl, {
                label: __('Stat 2 Label', 'shrestha-core'),
                value: attributes.stat2Label,
                onChange: val => setAttributes({ stat2Label: val })
              }),
              el(TextControl, {
                label: __('Stat 3 Value', 'shrestha-core'),
                value: attributes.stat3Value,
                onChange: val => setAttributes({ stat3Value: val })
              }),
              el(TextControl, {
                label: __('Stat 3 Label', 'shrestha-core'),
                value: attributes.stat3Label,
                onChange: val => setAttributes({ stat3Label: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     8. ABOUT STORY BLOCK
     ========================================================================= */
  registerBlockType('shrestha/about-story', {
    title: __('About Founding Story', 'shrestha-core'),
    description: __('The founding narrative of Shrestha atelier, master sculptor quote and photo cards.', 'shrestha-core'),
    icon: 'book',
    category: 'shrestha-blocks',
    attributes: {
      sectionNumber: { type: 'string', default: '01' },
      sectionLabel: { type: 'string', default: 'OUR FOUNDING STORY' },
      title: { type: 'string', default: 'Born from Devotion,' },
      titleHighlight: { type: 'string', default: 'Carried through Fire and Metal.' },
      introText: { type: 'string', default: "In 1982, amidst the ancient courtyards of Patan — Nepal's historic epicentre of sacred metallurgy — Master Sculptor Rajendra Shrestha founded our family atelier with a single, uncompromising vision: to preserve the authentic Newar lost-wax casting traditions passed down across generations." },
      p1: { type: 'string', default: "What began as a humble one-furnace workshop in the alleys of Gabahal has grown into one of Nepal's most revered sacred art foundries. Today, three generations of the Shrestha family work side by side with more than 30 master artisans, chisellers, gilders, and iconographers." },
      p2: { type: 'string', default: "Every statue that leaves our atelier is not simply a decorative object — it is a sacred vessel, created according to strict canonical proportions (Iconometry) set forth in ancient Buddhist and Hindu scriptures. From the initial beeswax sculpture to the final 24K gold mercury gilding, each piece embodies centuries of spiritual dedication." },
      quoteText: { type: 'string', default: 'A deity statue is not merely cast; it is invited into existence through reverence, patience, and the sacred fire of Patan.' },
      quoteAuthor: { type: 'string', default: 'Rajendra Shrestha' },
      quoteRole: { type: 'string', default: 'Founder & Master Sculptor' },
      founderName: { type: 'string', default: 'Master Rajendra Shrestha' },
      founderRole: { type: 'string', default: 'Founding Master Sculptor • Patan Atelier, 1982' },
      badgeYears: { type: 'string', default: '40+' },
      image1: { type: 'string', default: '' },
      image2: { type: 'string', default: '' },
      image3: { type: 'string', default: '' }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '📜',
        title: __('About: Founding Story & Master Sculptor', 'shrestha-core'),
        subtitle: __('Detailed atelier origin history, philosophical quote & founder credentials', 'shrestha-core'),
        rows: [
          {
            title: __('1. Section Header', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Section Number', 'shrestha-core'),
                value: attributes.sectionNumber,
                onChange: val => setAttributes({ sectionNumber: val })
              }),
              el(TextControl, {
                label: __('Section Tag Label', 'shrestha-core'),
                value: attributes.sectionLabel,
                onChange: val => setAttributes({ sectionLabel: val })
              }),
              el(TextControl, {
                label: __('Headline Title', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Title Gradient Highlight', 'shrestha-core'),
                value: attributes.titleHighlight,
                onChange: val => setAttributes({ titleHighlight: val })
              })
            )
          },
          {
            title: __('2. Narrative Paragraphs', 'shrestha-core'),
            content: el('div', {},
              el(TextareaControl, {
                label: __('Introduction Lead Paragraph', 'shrestha-core'),
                value: attributes.introText,
                rows: 3,
                onChange: val => setAttributes({ introText: val })
              }),
              el(TextareaControl, {
                label: __('Story Paragraph 1', 'shrestha-core'),
                value: attributes.p1,
                rows: 3,
                onChange: val => setAttributes({ p1: val })
              }),
              el(TextareaControl, {
                label: __('Story Paragraph 2', 'shrestha-core'),
                value: attributes.p2,
                rows: 3,
                onChange: val => setAttributes({ p2: val })
              })
            )
          },
          {
            title: __('3. Master Quote & Founder Card', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextareaControl, {
                label: __('Founder Quote Text', 'shrestha-core'),
                value: attributes.quoteText,
                rows: 2,
                onChange: val => setAttributes({ quoteText: val })
              }),
              el(TextControl, {
                label: __('Quote Author', 'shrestha-core'),
                value: attributes.quoteAuthor,
                onChange: val => setAttributes({ quoteAuthor: val })
              }),
              el(TextControl, {
                label: __('Quote Role', 'shrestha-core'),
                value: attributes.quoteRole,
                onChange: val => setAttributes({ quoteRole: val })
              }),
              el(TextControl, {
                label: __('Founder Card Name', 'shrestha-core'),
                value: attributes.founderName,
                onChange: val => setAttributes({ founderName: val })
              }),
              el(TextControl, {
                label: __('Founder Card Subtitle', 'shrestha-core'),
                value: attributes.founderRole,
                onChange: val => setAttributes({ founderRole: val })
              }),
              el(TextControl, {
                label: __('Years Heritage Badge Number', 'shrestha-core'),
                value: attributes.badgeYears,
                onChange: val => setAttributes({ badgeYears: val })
              })
            )
          },
          {
            title: __('4. Story Photos & Gallery', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(ShresthaMediaPicker, {
                label: __('Main Atelier Photo (Image 1)', 'shrestha-core'),
                imageUrl: attributes.image1,
                imageAsset: 'about-gallery-1.jpg',
                onSelect: media => setAttributes({ image1: media.url }),
                onRemove: () => setAttributes({ image1: '' })
              }),
              el(ShresthaMediaPicker, {
                label: __('Detail / Chisel Photo (Image 2)', 'shrestha-core'),
                imageUrl: attributes.image2,
                imageAsset: 'about-gallery-2.jpg',
                onSelect: media => setAttributes({ image2: media.url }),
                onRemove: () => setAttributes({ image2: '' })
              }),
              el(ShresthaMediaPicker, {
                label: __('Furnace / Crucible Photo (Image 3)', 'shrestha-core'),
                imageUrl: attributes.image3,
                imageAsset: 'about-gallery-3.jpg',
                onSelect: media => setAttributes({ image3: media.url }),
                onRemove: () => setAttributes({ image3: '' })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     9. ABOUT HERITAGE & TIMELINE BLOCK
     ========================================================================= */
  registerBlockType('shrestha/about-heritage', {
    title: __('About Heritage & Timeline', 'shrestha-core'),
    description: __('Historic timeline of Newar metallurgy and atelier milestones.', 'shrestha-core'),
    icon: 'backup',
    category: 'shrestha-blocks',
    attributes: {
      sectionNumber: { type: 'string', default: '02' },
      sectionLabel: { type: 'string', default: 'OUR HERITAGE & TIMELINE' },
      title: { type: 'string', default: 'Centuries of Sacred Artistry,' },
      titleHighlight: { type: 'string', default: 'Four Decades of Foundry Heritage.' },
      description: { type: 'string', default: 'Patan — historically known as Lalitpur, the "City of Fine Arts" — has been the heart of Himalayan metal casting since the Licchavi dynasty (400–750 CE). Our foundry carries forward this unbroken lineage.' },
      p1: { type: 'string', default: 'The Newar artisans of Patan are celebrated throughout Asia for their mastery of the lost-wax (cire perdue) casting technique. In the 13th century, Patan\'s master artist Araniko was summoned to the court of Kublai Khan, introducing Himalayan iconography and casting techniques across China and Tibet.' },
      p2: { type: 'string', default: 'Today, our atelier is one of the few surviving foundries in Patan that maintains every step of this ancient process in-house — from natural beeswax modeling to traditional river-clay investment and 24-karat gold mercury fire gilding.' },
      timeline: { type: 'array', default: [] }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '⏳',
        title: __('About: Lineage & Historical Timeline', 'shrestha-core'),
        subtitle: __('Milestones of Patan metal casting history and foundry expansion', 'shrestha-core'),
        rows: [
          {
            title: __('1. Section Header & Overview', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Section Number', 'shrestha-core'),
                value: attributes.sectionNumber,
                onChange: val => setAttributes({ sectionNumber: val })
              }),
              el(TextControl, {
                label: __('Section Tag Label', 'shrestha-core'),
                value: attributes.sectionLabel,
                onChange: val => setAttributes({ sectionLabel: val })
              }),
              el(TextControl, {
                label: __('Headline Title', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Title Gradient Highlight', 'shrestha-core'),
                value: attributes.titleHighlight,
                onChange: val => setAttributes({ titleHighlight: val })
              }),
              el(TextareaControl, {
                label: __('Overview Lead Description', 'shrestha-core'),
                value: attributes.description,
                rows: 3,
                onChange: val => setAttributes({ description: val })
              })
            )
          },
          {
            title: __('2. Historical Context Paragraphs', 'shrestha-core'),
            content: el('div', {},
              el(TextareaControl, {
                label: __('Araniko & Patan History Paragraph', 'shrestha-core'),
                value: attributes.p1,
                rows: 3,
                onChange: val => setAttributes({ p1: val })
              }),
              el(TextareaControl, {
                label: __('Modern Preservation Paragraph', 'shrestha-core'),
                value: attributes.p2,
                rows: 3,
                onChange: val => setAttributes({ p2: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     9b. ABOUT ARTISANS BLOCK (SECTION 03: THE HANDS BEHIND THE ART)
     ========================================================================= */
  registerBlockType('shrestha/about-artisans', {
    title: __('About Master Artisans (Hands Behind the Art)', 'shrestha-core'),
    description: __('Artisan showcase with photo preview, skilled hands highlight and atelier credentials.', 'shrestha-core'),
    icon: 'groups',
    category: 'shrestha-blocks',
    attributes: {
      kicker: { type: 'string', default: '03 - OUR ARTISANS' },
      titleLine1: { type: 'string', default: 'The Hands Behind the' },
      titleLine2: { type: 'string', default: 'Art.' },
      description1: { type: 'string', default: 'A sculpture carries the character of the hands that create it. Our artisans work patiently through every stage of the process, from the first wax model to the final surface finish.' },
      description2: { type: 'string', default: 'We believe that preserving craftsmanship means supporting the knowledge, precision and creativity of the people who continue to practice it.' },
      stat1Val: { type: 'string', default: 'Hand' },
      stat1Lbl: { type: 'string', default: 'FINISHED DETAILS' },
      stat2Val: { type: 'string', default: 'Patan' },
      stat2Lbl: { type: 'string', default: 'ARTISAN COMMUNITY' },
      overlayKicker: { type: 'string', default: 'THE PEOPLE' },
      overlayTitle: { type: 'string', default: 'Skilled Hands.' },
      overlayDesc: { type: 'string', default: 'Craftsmanship lives through the people who practice it.' },
      imageUrl: { type: 'string', default: '' }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '👥',
        title: __('About: Artisans & Craft Community', 'shrestha-core'),
        subtitle: __('Artisan hands narrative, workshop credentials & floating card visual', 'shrestha-core'),
        rows: [
          {
            title: __('1. Section Header & Content', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Section Kicker Tag', 'shrestha-core'),
                value: attributes.kicker,
                onChange: val => setAttributes({ kicker: val })
              }),
              el(TextControl, {
                label: __('Title Line 1', 'shrestha-core'),
                value: attributes.titleLine1,
                onChange: val => setAttributes({ titleLine1: val })
              }),
              el(TextControl, {
                label: __('Title Line 2 (Highlighted)', 'shrestha-core'),
                value: attributes.titleLine2,
                onChange: val => setAttributes({ titleLine2: val })
              }),
              el(TextareaControl, {
                label: __('Paragraph 1', 'shrestha-core'),
                value: attributes.description1,
                rows: 3,
                onChange: val => setAttributes({ description1: val })
              }),
              el(TextareaControl, {
                label: __('Paragraph 2', 'shrestha-core'),
                value: attributes.description2,
                rows: 3,
                onChange: val => setAttributes({ description2: val })
              })
            )
          },
          {
            title: __('2. Stats & Floating Card', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Stat 1 Value', 'shrestha-core'),
                value: attributes.stat1Val,
                onChange: val => setAttributes({ stat1Val: val })
              }),
              el(TextControl, {
                label: __('Stat 1 Label', 'shrestha-core'),
                value: attributes.stat1Lbl,
                onChange: val => setAttributes({ stat1Lbl: val })
              }),
              el(TextControl, {
                label: __('Stat 2 Value', 'shrestha-core'),
                value: attributes.stat2Val,
                onChange: val => setAttributes({ stat2Val: val })
              }),
              el(TextControl, {
                label: __('Stat 2 Label', 'shrestha-core'),
                value: attributes.stat2Lbl,
                onChange: val => setAttributes({ stat2Lbl: val })
              }),
              el(TextControl, {
                label: __('Overlay Card Kicker', 'shrestha-core'),
                value: attributes.overlayKicker,
                onChange: val => setAttributes({ overlayKicker: val })
              }),
              el(TextControl, {
                label: __('Overlay Card Title', 'shrestha-core'),
                value: attributes.overlayTitle,
                onChange: val => setAttributes({ overlayTitle: val })
              }),
              el(TextControl, {
                label: __('Overlay Card Description', 'shrestha-core'),
                value: attributes.overlayDesc,
                onChange: val => setAttributes({ overlayDesc: val })
              }),
              el(ShresthaMediaPicker, {
                label: __('Artisans Photo (Default: footer_buddha_statue.jpg)', 'shrestha-core'),
                imageUrl: attributes.imageUrl,
                imageAsset: 'footer_buddha_statue.jpg',
                onSelect: media => setAttributes({ imageUrl: media.url }),
                onRemove: () => setAttributes({ imageUrl: '' })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     10. ABOUT MATERIALS BLOCK
     ========================================================================= */
  registerBlockType('shrestha/about-materials', {
    title: __('About Sacred Materials', 'shrestha-core'),
    description: __('Details on Ashtadhatu, 24K gold gilding, and sacred finishes.', 'shrestha-core'),
    icon: 'shield',
    category: 'shrestha-blocks',
    attributes: {
      sectionNumber: { type: 'string', default: '03' },
      sectionLabel: { type: 'string', default: 'SACRED METALLURGY & MATERIALS' },
      title: { type: 'string', default: 'Alloys of Divine Resonance,' },
      titleHighlight: { type: 'string', default: 'Finishes of Eternal Lustre.' },
      description: { type: 'string', default: 'Every material used in our atelier is selected for its spiritual significance, physical permanence, and metallurgical authenticity. We do not use commercial shortcuts, synthetic resins, or electroplated imitations.' },
      materials: { type: 'array', default: [] }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '🛡️',
        title: __('About: Sacred Metallurgy & Materials', 'shrestha-core'),
        subtitle: __('Ashtadhatu 8-metal alloy, 24K fire-gilding & sacred patinas showcase', 'shrestha-core'),
        rows: [
          {
            title: __('1. Section Header & Intro', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Section Number', 'shrestha-core'),
                value: attributes.sectionNumber,
                onChange: val => setAttributes({ sectionNumber: val })
              }),
              el(TextControl, {
                label: __('Section Tag Label', 'shrestha-core'),
                value: attributes.sectionLabel,
                onChange: val => setAttributes({ sectionLabel: val })
              }),
              el(TextControl, {
                label: __('Headline Title', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Title Gradient Highlight', 'shrestha-core'),
                value: attributes.titleHighlight,
                onChange: val => setAttributes({ titleHighlight: val })
              }),
              el(TextareaControl, {
                label: __('Materials Description', 'shrestha-core'),
                value: attributes.description,
                rows: 3,
                onChange: val => setAttributes({ description: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     11. ABOUT PHILOSOPHY BLOCK
     ========================================================================= */
  registerBlockType('shrestha/about-philosophy', {
    title: __('About Sacred Philosophy', 'shrestha-core'),
    description: __('Five foundational spiritual principles guiding our sacred craftsmanship.', 'shrestha-core'),
    icon: 'heart',
    category: 'shrestha-blocks',
    attributes: {
      sectionNumber: { type: 'string', default: '04' },
      sectionLabel: { type: 'string', default: 'OUR SACRED PHILOSOPHY' },
      title: { type: 'string', default: 'Craft as Meditation,' },
      titleHighlight: { type: 'string', default: 'Form as Spiritual Truth.' },
      description: { type: 'string', default: 'In the Himalayan metallurgical tradition, casting a sacred deity is considered an act of spiritual merit (punya) and deep contemplative devotion (sadhana). Our work is guided by five foundational principles.' },
      tenets: { type: 'array', default: [] }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '🕉️',
        title: __('About: Sacred Philosophy & Tenets', 'shrestha-core'),
        subtitle: __('Spiritual canons (Shilpa Shastra, Iconometry, Sadhana & Consecration)', 'shrestha-core'),
        rows: [
          {
            title: __('1. Section Header & Principles', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Section Number', 'shrestha-core'),
                value: attributes.sectionNumber,
                onChange: val => setAttributes({ sectionNumber: val })
              }),
              el(TextControl, {
                label: __('Section Tag Label', 'shrestha-core'),
                value: attributes.sectionLabel,
                onChange: val => setAttributes({ sectionLabel: val })
              }),
              el(TextControl, {
                label: __('Headline Title', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Title Gradient Highlight', 'shrestha-core'),
                value: attributes.titleHighlight,
                onChange: val => setAttributes({ titleHighlight: val })
              }),
              el(TextareaControl, {
                label: __('Philosophy Description', 'shrestha-core'),
                value: attributes.description,
                rows: 3,
                onChange: val => setAttributes({ description: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     12. ABOUT ATELIER BLOCK
     ========================================================================= */
  registerBlockType('shrestha/about-atelier', {
    title: __('About Atelier & Community', 'shrestha-core'),
    description: __('The heart of our foundry in Patan, working spaces and artisan community.', 'shrestha-core'),
    icon: 'groups',
    category: 'shrestha-blocks',
    attributes: {
      sectionNumber: { type: 'string', default: '06' },
      sectionLabel: { type: 'string', default: 'OUR WORKSHOP & COMMUNITY' },
      title: { type: 'string', default: 'The Heart of Our Craft:' },
      titleHighlight: { type: 'string', default: 'The Patan Atelier.' },
      description: { type: 'string', default: 'Located in the historic artisanal quarters of Patan, our multi-level atelier is where ancient fire meets dedicated hands. We are more than a workshop — we are an artisanal family and a living craft school.' },
      sections: { type: 'array', default: [] }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '🏭',
        title: __('About: Patan Workshop & Community', 'shrestha-core'),
        subtitle: __('Wax studio, bronze foundry, master chiselling & gilding floors', 'shrestha-core'),
        rows: [
          {
            title: __('1. Section Header & Overview', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Section Number', 'shrestha-core'),
                value: attributes.sectionNumber,
                onChange: val => setAttributes({ sectionNumber: val })
              }),
              el(TextControl, {
                label: __('Section Tag Label', 'shrestha-core'),
                value: attributes.sectionLabel,
                onChange: val => setAttributes({ sectionLabel: val })
              }),
              el(TextControl, {
                label: __('Headline Title', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Title Gradient Highlight', 'shrestha-core'),
                value: attributes.titleHighlight,
                onChange: val => setAttributes({ titleHighlight: val })
              }),
              el(TextareaControl, {
                label: __('Atelier Description', 'shrestha-core'),
                value: attributes.description,
                rows: 3,
                onChange: val => setAttributes({ description: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     13. WHY CHOOSE US BLOCK
     ========================================================================= */
  registerBlockType('shrestha/why-choose-us', {
    title: __('Why Choose Us Block', 'shrestha-core'),
    description: __('Sacred heritage, lost-wax casting standards, and trust assurance counters.', 'shrestha-core'),
    icon: 'star-filled',
    category: 'shrestha-blocks',
    attributes: {
      sectionNumber: { type: 'string', default: '07' },
      sectionLabel: { type: 'string', default: 'WHY CHOOSE SHRESTHA HANDICRAFT' },
      title: { type: 'string', default: 'Sacred Heritage,' },
      titleHighlight: { type: 'string', default: 'Uncompromising Standards.' },
      description: { type: 'string', default: 'From master Newar lost-wax casting and strict iconometric proportions to museum-grade curation and worldwide insured delivery, discover why temples, monasteries, and discerning collectors entrust their sacred acquisitions to our Patan atelier.' },
      features: { type: 'array', default: [] },
      counters: { type: 'array', default: [] }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '🌟',
        title: __('Why Choose Shrestha Handicraft', 'shrestha-core'),
        subtitle: __('Uncompromising standards, canonical iconometry & assurance banner', 'shrestha-core'),
        rows: [
          {
            title: __('1. Section Header', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Section Number', 'shrestha-core'),
                value: attributes.sectionNumber,
                onChange: val => setAttributes({ sectionNumber: val })
              }),
              el(TextControl, {
                label: __('Section Tag Label', 'shrestha-core'),
                value: attributes.sectionLabel,
                onChange: val => setAttributes({ sectionLabel: val })
              }),
              el(TextControl, {
                label: __('Headline Title', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Title Gradient Highlight', 'shrestha-core'),
                value: attributes.titleHighlight,
                onChange: val => setAttributes({ titleHighlight: val })
              }),
              el(TextareaControl, {
                label: __('Section Description', 'shrestha-core'),
                value: attributes.description,
                rows: 3,
                onChange: val => setAttributes({ description: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     14. ABOUT CTA BANNER BLOCK
     ========================================================================= */
  registerBlockType('shrestha/about-cta', {
    title: __('About Bottom CTA Banner', 'shrestha-core'),
    description: __('Continue your journey call to action banner with dual collection/contact buttons.', 'shrestha-core'),
    icon: 'megaphone',
    category: 'shrestha-blocks',
    attributes: {
      subtitle: { type: 'string', default: 'CONTINUE YOUR JOURNEY' },
      title: { type: 'string', default: 'Discover the Art ' },
      titleHighlight: { type: 'string', default: 'of Shrestha Handicraft.' },
      description: { type: 'string', default: 'Explore our collection of handcrafted sculptures or speak with our atelier team about finding a piece that feels right for you.' },
      primaryBtnText: { type: 'string', default: 'EXPLORE COLLECTION +' },
      primaryBtnUrl: { type: 'string', default: '' },
      secondaryBtnText: { type: 'string', default: 'CONTACT OUR ATELIER' },
      secondaryBtnUrl: { type: 'string', default: '' }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '📢',
        title: __('About: Bottom Call to Action Banner', 'shrestha-core'),
        subtitle: __('Eye-catching closing banner with links to catalog & contact', 'shrestha-core'),
        rows: [
          {
            title: __('1. Banner Headlines & Text', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Subtitle Kicker', 'shrestha-core'),
                value: attributes.subtitle,
                onChange: val => setAttributes({ subtitle: val })
              }),
              el(TextControl, {
                label: __('Main Title', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Title Gradient Highlight', 'shrestha-core'),
                value: attributes.titleHighlight,
                onChange: val => setAttributes({ titleHighlight: val })
              }),
              el(TextareaControl, {
                label: __('Description Paragraph', 'shrestha-core'),
                value: attributes.description,
                rows: 3,
                onChange: val => setAttributes({ description: val })
              })
            )
          },
          {
            title: __('2. Action Buttons & Links', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Primary Button Text', 'shrestha-core'),
                value: attributes.primaryBtnText,
                onChange: val => setAttributes({ primaryBtnText: val })
              }),
              el(TextControl, {
                label: __('Primary Button URL', 'shrestha-core'),
                value: attributes.primaryBtnUrl,
                placeholder: '/catalog/',
                onChange: val => setAttributes({ primaryBtnUrl: val })
              }),
              el(TextControl, {
                label: __('Secondary Button Text', 'shrestha-core'),
                value: attributes.secondaryBtnText,
                onChange: val => setAttributes({ secondaryBtnText: val })
              }),
              el(TextControl, {
                label: __('Secondary Button URL', 'shrestha-core'),
                value: attributes.secondaryBtnUrl,
                placeholder: '/contact/',
                onChange: val => setAttributes({ secondaryBtnUrl: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     15. CATALOG HERO BLOCK
     ========================================================================= */
  registerBlockType('shrestha/catalog-hero', {
    title: __('Catalog Hero Header', 'shrestha-core'),
    description: __('Catalog collection title, description, and live search/sort controls.', 'shrestha-core'),
    icon: 'store',
    category: 'shrestha-blocks',
    attributes: {
      badgeText: { type: 'string', default: 'SACRED COLLECTION • PATAN ATELIER' },
      title: { type: 'string', default: 'The Consecrated Specimen Catalog' },
      titleHighlight: { type: 'string', default: '' },
      description: { type: 'string', default: 'Each deity statue is individually sculpted in lost-wax, smelted in ritual Ashtadhatu 8-metal alloy, and finished in 24K mercury fire-gilding.' },
      showSearch: { type: 'boolean', default: true },
      showSort: { type: 'boolean', default: true }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '🏷️',
        title: __('Catalog: Header & Search Controls', 'shrestha-core'),
        subtitle: __('Collection introduction headline with instant search and sorting', 'shrestha-core'),
        rows: [
          {
            title: __('1. Headlines & Introduction', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Badge / Kicker Tag', 'shrestha-core'),
                value: attributes.badgeText,
                onChange: val => setAttributes({ badgeText: val })
              }),
              el(TextControl, {
                label: __('Main Headline', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Title Gradient Highlight (Optional)', 'shrestha-core'),
                value: attributes.titleHighlight,
                onChange: val => setAttributes({ titleHighlight: val })
              }),
              el(TextareaControl, {
                label: __('Collection Description', 'shrestha-core'),
                value: attributes.description,
                rows: 3,
                onChange: val => setAttributes({ description: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     16. CATALOG GRID BLOCK
     ========================================================================= */
  registerBlockType('shrestha/catalog-grid', {
    title: __('Catalog Specimen Grid', 'shrestha-core'),
    description: __('Dynamic grid of sacred specimens with alloy taxonomy filters, HUD specs and quick acquire.', 'shrestha-core'),
    icon: 'grid-view',
    category: 'shrestha-blocks',
    attributes: {
      columns: { type: 'string', default: '3' },
      showFilterPills: { type: 'boolean', default: true },
      postsPerPage: { type: 'number', default: -1 }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      const adminUrl = (window.shresthaCoreData && window.shresthaCoreData.siteUrl) ? window.shresthaCoreData.siteUrl : '/';

      return el(AccordionCard, {
        icon: '📿',
        title: __('Catalog: Specimen Product Grid', 'shrestha-core'),
        subtitle: __('Dynamic taxonomy pills, responsive product cards & inspect modal triggers', 'shrestha-core'),
        rows: [
          {
            title: __('1. Grid Settings & Query', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Desktop Columns (2, 3, or 4)', 'shrestha-core'),
                value: attributes.columns,
                placeholder: '3',
                onChange: val => setAttributes({ columns: val })
              }),
              el(TextControl, {
                label: __('Number of Items to Display (-1 for all)', 'shrestha-core'),
                value: String(attributes.postsPerPage),
                onChange: val => setAttributes({ postsPerPage: parseInt(val, 10) || -1 })
              })
            )
          },
          {
            title: __('2. Sacred Specimens Management', 'shrestha-core'),
            content: el('div', { style: { display: 'flex', gap: '10px', alignItems: 'center', flexWrap: 'wrap' } },
              el('a', {
                href: adminUrl + 'wp-admin/edit.php?post_type=specimen',
                target: '_blank',
                className: 'button button-primary',
                style: { fontSize: '12px' }
              }, '💎 ' + __('Manage Sacred Specimens in WP Admin', 'shrestha-core')),
              el('a', {
                href: adminUrl + 'wp-admin/edit-tags.php?taxonomy=alloy_type&post_type=specimen',
                target: '_blank',
                className: 'button button-secondary',
                style: { fontSize: '12px' }
              }, '🏷️ ' + __('Manage Alloy Types', 'shrestha-core'))
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     17. CATALOG COMMISSION BLOCK
     ========================================================================= */
  registerBlockType('shrestha/catalog-commission', {
    title: __('Catalog Bespoke Commission CTA', 'shrestha-core'),
    description: __('Callout banner inviting bespoke deity commissions and direct atelier consultations.', 'shrestha-core'),
    icon: 'art',
    category: 'shrestha-blocks',
    attributes: {
      kicker: { type: 'string', default: 'BESPOKE COMMISSIONS' },
      title: { type: 'string', default: 'Commission a Sacred Specimen ' },
      titleHighlight: { type: 'string', default: 'for Temples & Altars.' },
      description: { type: 'string', default: 'Collaborate directly with our master Newar sculptors to create tailor-made deity manifestations with custom iconometric dimensions, consecrated hollow chambers, and pure 8-metal Ashtadhatu formulations.' },
      primaryBtnText: { type: 'string', default: 'REQUEST BESPOKE COMMISSION' },
      primaryBtnUrl: { type: 'string', default: '' },
      secondaryBtnText: { type: 'string', default: 'SPEAK WITH ATELIER' },
      secondaryBtnUrl: { type: 'string', default: '' }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '🎨',
        title: __('Catalog: Bespoke Commission Banner', 'shrestha-core'),
        subtitle: __('Custom order invitation with links to commission inquiries & contact', 'shrestha-core'),
        rows: [
          {
            title: __('1. Headlines & Copy', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Kicker Tag', 'shrestha-core'),
                value: attributes.kicker,
                onChange: val => setAttributes({ kicker: val })
              }),
              el(TextControl, {
                label: __('Main Title', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Title Gradient Highlight', 'shrestha-core'),
                value: attributes.titleHighlight,
                onChange: val => setAttributes({ titleHighlight: val })
              }),
              el(TextareaControl, {
                label: __('Description Paragraph', 'shrestha-core'),
                value: attributes.description,
                rows: 3,
                onChange: val => setAttributes({ description: val })
              })
            )
          },
          {
            title: __('2. Action Buttons & Links', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Primary Button Text', 'shrestha-core'),
                value: attributes.primaryBtnText,
                onChange: val => setAttributes({ primaryBtnText: val })
              }),
              el(TextControl, {
                label: __('Primary Button URL', 'shrestha-core'),
                value: attributes.primaryBtnUrl,
                placeholder: '/contact/',
                onChange: val => setAttributes({ primaryBtnUrl: val })
              }),
              el(TextControl, {
                label: __('Secondary Button Text', 'shrestha-core'),
                value: attributes.secondaryBtnText,
                onChange: val => setAttributes({ secondaryBtnText: val })
              }),
              el(TextControl, {
                label: __('Secondary Button URL', 'shrestha-core'),
                value: attributes.secondaryBtnUrl,
                placeholder: '/contact/',
                onChange: val => setAttributes({ secondaryBtnUrl: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     18. CONTACT HERO BLOCK
     ========================================================================= */
  registerBlockType('shrestha/contact-hero', {
    title: __('Contact Hero Header', 'shrestha-core'),
    description: __('Contact page header banner with provenance kicker, headline, and subtitle.', 'shrestha-core'),
    icon: 'location-alt',
    category: 'shrestha-blocks',
    attributes: {
      badgeText: { type: 'string', default: 'ATELIER CONCIERGE • PATAN SHOWROOM' },
      title: { type: 'string', default: 'Commission a Sacred Masterpiece' },
      titleHighlight: { type: 'string', default: '' },
      description: { type: 'string', default: 'Inquire about existing consecrated specimens or initiate a bespoke temple casting with our 8th-generation Newar master sculptors.' }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '📍',
        title: __('Contact: Header Banner', 'shrestha-core'),
        subtitle: __('Atelier concierge headline and commissioning subtitle', 'shrestha-core'),
        rows: [
          {
            title: __('1. Headlines & Introduction', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Pill Tag Badge', 'shrestha-core'),
                value: attributes.badgeText,
                onChange: val => setAttributes({ badgeText: val })
              }),
              el(TextControl, {
                label: __('Main Headline', 'shrestha-core'),
                value: attributes.title,
                onChange: val => setAttributes({ title: val })
              }),
              el(TextControl, {
                label: __('Title Gradient Highlight (Optional)', 'shrestha-core'),
                value: attributes.titleHighlight,
                onChange: val => setAttributes({ titleHighlight: val })
              }),
              el(TextareaControl, {
                label: __('Description Paragraph', 'shrestha-core'),
                value: attributes.description,
                rows: 3,
                onChange: val => setAttributes({ description: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

  /* =========================================================================
     19. CONTACT SECTION (SHOWROOM INFO & INQUIRY FORM)
     ========================================================================= */
  registerBlockType('shrestha/contact-section', {
    title: __('Contact Showroom & Inquiry Form', 'shrestha-core'),
    description: __('2-Column section with Patan showroom contact details, Google Maps, and AJAX commission form.', 'shrestha-core'),
    icon: 'email-alt',
    category: 'shrestha-blocks',
    attributes: {
      showroomTitle: { type: 'string', default: 'Patan Showroom & Foundry' },
      address: { type: 'string', default: '' },
      phone: { type: 'string', default: '' },
      whatsapp: { type: 'string', default: '' },
      email: { type: 'string', default: '' },
      hours: { type: 'string', default: '' },
      mapUrl: { type: 'string', default: '' },
      formKicker: { type: 'string', default: 'BESPOKE INQUIRY' },
      formTitle: { type: 'string', default: 'Initiate Commission Dialogue' },
      formDescription: { type: 'string', default: 'Our Master Curator coordinates directly with patrons, temples, and collectors worldwide to design and cast bespoke sacred iconography.' },
      submitBtnText: { type: 'string', default: 'Transmit Commission Protocol' }
    },
    edit: function (props) {
      const { attributes, setAttributes } = props;
      return el(AccordionCard, {
        icon: '🏛️',
        title: __('Contact: Showroom Info & Inquiry Protocol', 'shrestha-core'),
        subtitle: __('Foundry address, hotline, WhatsApp concierge, map embed & AJAX inquiry form', 'shrestha-core'),
        rows: [
          {
            title: __('1. Showroom & Concierge Information', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Showroom Card Title', 'shrestha-core'),
                value: attributes.showroomTitle,
                onChange: val => setAttributes({ showroomTitle: val })
              }),
              el(TextControl, {
                label: __('Showroom Address (leave empty for Customizer default)', 'shrestha-core'),
                value: attributes.address,
                placeholder: 'Hakha Tole, Ward 12, Patan Lalitpur, Nepal',
                onChange: val => setAttributes({ address: val })
              }),
              el(TextControl, {
                label: __('Direct Foundry Hotline', 'shrestha-core'),
                value: attributes.phone,
                placeholder: '+977 1 552 1432',
                onChange: val => setAttributes({ phone: val })
              }),
              el(TextControl, {
                label: __('WhatsApp Concierge Number', 'shrestha-core'),
                value: attributes.whatsapp,
                placeholder: '+977 984 123 4567',
                onChange: val => setAttributes({ whatsapp: val })
              }),
              el(TextControl, {
                label: __('Curator Email Address', 'shrestha-core'),
                value: attributes.email,
                placeholder: 'curator@shresthahandicraft.com',
                onChange: val => setAttributes({ email: val })
              }),
              el(TextControl, {
                label: __('Visiting Hours', 'shrestha-core'),
                value: attributes.hours,
                placeholder: 'Sun – Fri: 09:00 AM – 06:00 PM NPT',
                onChange: val => setAttributes({ hours: val })
              }),
              el(TextControl, {
                label: __('Google Maps Iframe Embed URL', 'shrestha-core'),
                value: attributes.mapUrl,
                placeholder: 'https://www.google.com/maps/embed?...',
                onChange: val => setAttributes({ mapUrl: val })
              })
            )
          },
          {
            title: __('2. Bespoke Inquiry Form Settings', 'shrestha-core'),
            content: el('div', { className: 'shrestha-block-field-grid' },
              el(TextControl, {
                label: __('Form Kicker Tag', 'shrestha-core'),
                value: attributes.formKicker,
                onChange: val => setAttributes({ formKicker: val })
              }),
              el(TextControl, {
                label: __('Form Headline Title', 'shrestha-core'),
                value: attributes.formTitle,
                onChange: val => setAttributes({ formTitle: val })
              }),
              el(TextareaControl, {
                label: __('Form Subtitle Description', 'shrestha-core'),
                value: attributes.formDescription,
                rows: 3,
                onChange: val => setAttributes({ formDescription: val })
              }),
              el(TextControl, {
                label: __('Submit Button Text', 'shrestha-core'),
                value: attributes.submitBtnText,
                onChange: val => setAttributes({ submitBtnText: val })
              })
            )
          }
        ]
      });
    },
    save: function () {
      return null;
    }
  });

})(window.wp.blocks, window.wp.element, window.wp.components, window.wp.i18n);


