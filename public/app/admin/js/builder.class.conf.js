var class_conf = {
    'section': ['height', 'align', 'flex-align', 'font', 'padding', 'margin', 'background', 'display', 'border', 'animate'],
    'container': ['container{breakpoint}', 'height', 'align', 'flex-align', 'font', 'padding', 'margin', 'background', 'display', 'border', 'animate'],
    'row': ['gutters', 'align', 'flex-align', 'background', 'display', 'animate'],
    'col-{breakpoint}': ['col{breakpoint}', 'align', 'flex-align', 'font', 'padding', 'margin', 'background', 'display', 'border', 'animate'],
    'content': ['align', 'font', 'padding', 'margin', 'border', 'animate'],
    'link': ['href', 'align', 'font', 'padding', 'margin', 'border', 'animate'],
    'icon': ['icon', 'margin', 'animate'],
    'img': ['image', 'height', 'margin', 'animate']
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