var APIBuilder = function(config) {
	config = config || {};
	APIBuilder.superclass.constructor.call(this,config);
}
Ext.extend(APIBuilder,Ext.Component,{
	page:{},window:{},grid:{},tree:{},panel:{},combo:{},config:{},view:{}
});
Ext.reg('apibuilder', APIBuilder);

APIBuilder = new APIBuilder();

/*
APIBuilder.panel.APIHostTemplateSettings = function(config) {
	config = config || {};
	Ext.applyIf(config,{
		id: 'apibuilder-panel-container-template-settings'
		,layout: 'column'
		,border: false
		,anchor: '100%'
		,defaults: {
			layout: 'form'
			,labelAlign: 'top'
			,anchor: '100%'
			,border: false
			,labelSeparator: ''
		}
		,items: this.getItems(config)
	});
	APIBuilder.panel.APIHostTemplateSettings.superclass.constructor.call(this,config);
};

Ext.reg('apibuilder-tab-template-settings',APIBuilder.panel.APIHostTemplateSettings);
*/

/*
APIBuilder.page.CreateAPIHost = function(config) {
	config = config || {record:{}};
	config.record = config.record || {};
	Ext.applyIf(config,{
		panelXType: 'apibuilder-panel-apihost'
	});
	config.canDuplicate = false;
	config.canDelete = false;
	APIBuilder.page.CreateAPIHost.superclass.constructor.call(this,config);
};
Ext.extend(APIBuilder.page.CreateAPIHost,MODx.page.CreateResource,{});
Ext.reg('apibuilder-page-apihost-create',APIBuilder.page.CreateAPIHost);
*/