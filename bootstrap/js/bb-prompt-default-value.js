bootbox.prompt({
  title: "What is your real name?",
  value: "makeusabrew",
  callback: function(result) {
    if (result === null) {
      Example.show("Prompt dismissed");
    } else {
      Example.show("Hi <b>"+result+"</b>");
    }
  }
});