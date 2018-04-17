import {OptFrontendSharedSessions} from './opt-shared-sessions';
import {assert,htmlspecialchars} from './pytutor';
import {footerHtml} from './footer-html';

export class OptFrontendComposingprograms extends OptFrontendSharedSessions {
  constructor(params={}) {
    (params as any).disableLocalStorageToggles = true;
    super(params);
    this.originFrontendJsFile = 'composingprograms.js';
  }

  getBaseBackendOptionsObj() {
    var ret = {cumulative_mode: ($('#cumulativeModeSelector').val() == 'true'),
               heap_primitives: false,
               show_only_outputs: false,
               origin: this.originFrontendJsFile};
    return ret;
  }

  getBaseFrontendOptionsObj() {
    var ret = { compactFuncLabels: true,
                showAllFrameLabels: true,

                disableHeapNesting: false,
                textualMemoryLabels: false,

                executeCodeWithRawInputFunc: this.executeCodeWithRawInput.bind(this),
                updateOutputCallback: function() {$('#urlOutput,#urlOutputShortened,#embedCodeOutput').val('');},
                startingInstruction: 0,

                visualizerIdOverride: '1',
              };
    return ret;
  }

} // END Class OptFrontendComposingprograms

$(document).ready(function() {
  $("#footer").append(footerHtml); // initialize all HTML before creating OptFrontend object
  var optFrontend = new OptFrontendComposingprograms();
  optFrontend.setSurveyHTML();
});
