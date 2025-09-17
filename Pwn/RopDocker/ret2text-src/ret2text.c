#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
char sh[]="/bin/sh";

int init_func() {
    setvbuf(stdin,0,2,0);
    setvbuf(stdout,0,2,0);
    setvbuf(stderr,0,2,0);
    return 0;
}

void info(){
    puts("=============Stack============");
    puts("│-010 ◂— 0x61616161 ('aaaa')");
    puts("│-00c ◂— 0x61616162 ('baaa')");
    puts("│-008 ◂— 0x61616163 ('caaa')");
    puts("│-004 ◂— 0x61616164 ('daaa')");
    puts("│ ebp ◂— 0x61616165 ('eaaa')");
    puts("│+004 —▸ return_addr");
    puts("==============================\n");
}

int func(){
    system(sh);
    return 0;
}

int dofunc() {
    char b[8] = {};
    puts("See the stack? Now, input something:");
    read(0, b, 0x1c);
    puts(b);
    return 0;
}

int main(){
    init_func();
    info();
    dofunc();
    return 0;
}

