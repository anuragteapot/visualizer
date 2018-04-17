import {OptFrontendSharedSessions} from './opt-shared-sessions';
import {assert,htmlspecialchars} from './pytutor';
import {footerHtml} from './footer-html';

export class OptFrontendCsc108h extends OptFrontendSharedSessions {
  constructor(params={}) {
    (params as any).disableLocalStorageToggles = true;
    super(params);
    this.originFrontendJsFile = 'csc108h.js';
  }

  getBaseBackendOptionsObj() {
    var ret = {cumulative_mode: false,
               heap_primitives: true,
               show_only_outputs: false,
               origin: this.originFrontendJsFile};
    return ret;
  }

  getBaseFrontendOptionsObj() {
    var ret = { disableHeapNesting: true, // render all objects on the heap
                drawParentPointers: true, // show environment parent pointers
                textualMemoryLabels: true, // use text labels for references

                executeCodeWithRawInputFunc: this.executeCodeWithRawInput.bind(this),
                updateOutputCallback: function() {$('#urlOutput,#urlOutputShortened,#embedCodeOutput').val('');},
                startingInstruction: 0,
                visualizerIdOverride: '1',
              };
    return ret;
  }

} // END Class OptFrontendCsc108h

$(document).ready(function() {
  $("#footer").append(footerHtml); // initialize all HTML before creating OptFrontend object
  var optFrontend = new OptFrontendCsc108h();
  optFrontend.setSurveyHTML();
});
