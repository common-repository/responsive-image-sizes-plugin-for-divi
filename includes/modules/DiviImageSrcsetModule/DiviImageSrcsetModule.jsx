// External Dependencies
import React from 'react';

import AjaxComponent from './../base/AjaxComponent';
import './style.css';

class DiviImageSrcsetModule extends AjaxComponent {

    static slug = 'et_pb_wptools_image';
    static global_module_index = 0;


    componentDidMount() {
        this.setState({
            module_index: DiviImageSrcsetModule.global_module_index
        });
        DiviImageSrcsetModule.global_module_index++;
        super.componentDidMount();
    }

    componentDidUpdate(prevProps) {
        super.componentDidUpdate(prevProps);
    }


    _shouldReload(oldProps, newProps) {
        return !this._compareObjects(newProps, oldProps);
    }

    _reloadData(props) {
        return {
            action: "et_fb_ajax_render_shortcode",
            et_pb_render_shortcode_nonce: window.ETBuilderBackend.nonces.renderShortcode,
            et_fb_module_index: this.state.module_index,
            options: {
                conditional_tags: window.ETBuilderBackend.conditionalTags,
                current_page: window.ETBuilderBackend.currentPage,
                post_type: window.ETBuilderBackend.postType
            },
            object: [{
                type: 'et_pb_wptools_image',
                content: '',
                attrs: props,
                raw_child_content: ''
            }]
        };
    }

    render() {
        return super.render();
    }

    _render() {
        return (
            <div dangerouslySetInnerHTML={{ __html : this.state.result.data }} />
            );
    }

}

export default DiviImageSrcsetModule;