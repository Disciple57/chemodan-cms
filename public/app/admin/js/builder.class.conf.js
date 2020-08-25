var class_conf = {
    'section': ['height', 'align', 'flex-align', 'font', 'padding', 'margin', 'background', 'display', 'border'],
    'container': ['container{breakpoint}', 'height', 'align', 'flex-align', 'font', 'padding', 'margin', 'background', 'display', 'border'],
    'row': ['gutters', 'align', 'flex-align', 'background'],
    'col-{breakpoint}': ['col{breakpoint}', 'align', 'flex-align', 'font', 'padding', 'margin', 'background', 'display', 'border'],
    'content': ['align', 'font', 'padding', 'margin', 'border'],
    'link': ['href', 'align', 'font', 'padding', 'margin', 'border'],
    'icon': ['icon', 'margin'],
    'img': ['image', 'height']
}, breakpoints = ['sm', 'md', 'lg', 'xl'];

// container
class_conf['container-fluid'] = class_conf.container;

breakpoints.forEach(function(item) {
    class_conf['container-' + item] = class_conf.container;

    for (var i = 1; i < 12; i++) {
        class_conf['col-' + item + '-' + i] = class_conf['col-{breakpoint}'];
    }
    class_conf['col-' + item + '-auto'] = class_conf['col-{breakpoint}'];
});
for (var i = 1; i < 12; i++) {
    class_conf['col-' + i] = class_conf['col-{breakpoint}'];
}
class_conf['col-auto'] = class_conf['col-{breakpoint}'];